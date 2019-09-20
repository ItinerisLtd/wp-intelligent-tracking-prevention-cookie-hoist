<?php
declare(strict_types=1);

namespace Itineris\WPIntelligentTrackingPreventionCookieHoist;

use WP_Error;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

class CookieCreateController
{
    const DEFAULT_PATH = '/';
    const DEFAULT_TTL = 30758400; // 1 year in second = 356 * 24 * 60 *60;
    const NAMESPACE = 'wpitpch/v1';
    const ROUTE = 'cookies';
    const TARGETS = ['_ga'];

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
            'args' => [
                'domain' => [ // TODO: Add `validate_callback`?
                    'required' => true,
                    'sanitize_callback' => function ($param) {
                        return sanitize_text_field($param);
                    },
                ],
                'path' => [ // TODO: Add `validate_callback`?
                    'required' => true,
                    'default' => static::DEFAULT_PATH,
                    'sanitize_callback' => function ($param) {
                        return sanitize_text_field($param);
                    },
                ],
                'ttl' => [
                    'required' => true,
                    'default' => static::DEFAULT_TTL,
                    'validate_callback' => function ($param) {
                        return is_int($param);
                    },
                ],
            ],
        ]);
    }

    /**
     * Create one item from the collection
     *
     * @param WP_REST_Request $request
     *
     * @return WP_Error|WP_REST_Response
     */
    public function create(WP_REST_Request $request)
    {
        // TODO: Add filters.
        $domain = $request->get_param('domain');
        $path = $request->get_param('path');
        $ttl = $request->get_param('ttl');


        $expire = time() + $ttl;

        $extendedCookies = array_map(function (string $name) use ($expire, $path, $domain) {
            // phpcs:ignore -- TODO: To be reviewed.
            if (! $_COOKIE[$name]) {
                return null;
            }

            // phpcs:ignore -- TODO: To be reviewed.
            return setcookie($name, $_COOKIE[$name], $expire, $path, $domain) ? $name : null;
        }, static::TARGETS);

        return new WP_REST_Response([
            'expire_at' => date('c', $expire),
            'extended' => array_filter($extendedCookies),
        ], 201);
    }
}
