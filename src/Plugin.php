<?php

declare(strict_types=1);

namespace Itineris\WPIntelligentTrackingPreventionCookieHoist;

class Plugin
{
    public static function run()
    {
        add_action('rest_api_init', function () {
            $controller = new CookieCreateController();
            $controller->registerRoute();
        });
    }
}
