<?php
/**
 * Plugin Name:       Task Manager
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Assign task to individual
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Codexpert Intern
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 */
// Register Custom Post Type

defined('ABSPATH') || exit;

// Custom Post Type Register
include "custom_post_register.php";

// User Assign
include "user_assign.php";

// User Task Complete Checkbox
include "plugin.php";