<?php
/**
 * Plugin Name:     WP Intelligent Tracking Prevention Cookie Hoist
 * Plugin URI:      https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist
 * Description:     TODO.
 * Version:         0.1.0-RC2
 * Author:          Itineris Limited
 * Author URI:      https://itineris.co.uk
 * License:         MIT
 * License URI:     https://opensource.org/licenses/MIT
 * Text Domain:     wp-intelligent-tracking-prevention-cookie-hoist
 */

declare(strict_types=1);

namespace Itineris\WPIntelligentTrackingPreventionCookieHoist;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

Plugin::run();
