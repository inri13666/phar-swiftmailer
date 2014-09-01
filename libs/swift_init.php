<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * Dependency injection initialization for Swift Mailer.
 */

if (defined('SWIFT_INIT_LOADED')) {
    return;
}

define('SWIFT_INIT_LOADED', true);

// Load in dependency maps
$config_dir = dirname(__FILE__);
if (defined('SWIFT_CONFIG_DIR')) {
    $config_dir = SWIFT_CONFIG_DIR;
}
require $config_dir . '/dependency_maps/cache_deps.php';
require $config_dir . '/dependency_maps/mime_deps.php';
require $config_dir . '/dependency_maps/message_deps.php';
require $config_dir . '/dependency_maps/transport_deps.php';

// Load in global library preferences
require $config_dir . '/preferences.php';
