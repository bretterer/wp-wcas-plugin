<?php

/*
Plugin Name: Warren County Astronomical Society
Plugin URI: https://github.com/bretterer/wp-wcas-plugin
Description: WordPress Plugin for Warren County Astronomical Society
Author: Brian Retterer
Version: 0.1.0
Author URI: https://bretterer.com
*/

use Bretterer\WcasPlugin\Shortcode\ShortcodeProvider;
use Bretterer\WcasPlugin\Shortcode\Test;

require_once __DIR__.'/vendor/autoload.php';

// Register Shortcodes
ShortcodeProvider::register([
    Test::class
]);