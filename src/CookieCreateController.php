<?php
declare(strict_types=1);

namespace Itineris\WPIntelligentTrackingPreventionCookieHoist;

use WP_Error;
use WP_REST_Response;
use WP_REST_Server;

class CookieCreateController
{
    const VERSION = '1';
    const NAMESPACE = 'wpitpch/v1';
    const ROUTE = 'cookies';
    const TARGETS = ['_ga'];
    const TTL = 61516800;

    /**
     * Register route.
     *
     * @return void
     */
    public function registerRoute()
    {
        register_rest_route(static::NAMESPACE, static::ROUTE, [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => [$this, 'create'],
        ]);
    } // 2 years in second = 2 * 356 * 24 * 60 *60;

    /**
     * Create one item from the collection
     *
     * @return WP_Error|WP_REST_Response
     */
    public function create()
    {
        // TODO: Add filters.
        $expire = time() + static::TTL;
        $parseHomeUrl = wp_parse_url(home_url());
        $path = $parseHomeUrl['path'] ?? '/';
        $domain = $parseHomeUrl['host'] ?? null;

        if (null === $domain) {
            return new WP_Error(
                'cookie-domain',
                __('Unable to determine cookie domain.', 'wp-intelligent-tracking-prevention-cookie-hoist'),
                [
                    'status' => 500,
                ]
            );
        }

        $extendedCookies = array_map(function (string $name) use ($expire, $path, $domain) {
            // phpcs:ignore -- TODO: To be reviewed.
            if (! $_COOKIE[$name]) {
                return null;
            }

            // TODO: Review `secure` parameter.
            // phpcs:ignore -- TODO: To be reviewed.
            setcookie($name, $_COOKIE[$name], $expire, $path, $domain);

            return $name;
        }, static::TARGETS);

        return new WP_REST_Response([
            'expire_at' => date('c', $expire),
            'extended' => array_filter($extendedCookies),
        ], 201);
    }
}
