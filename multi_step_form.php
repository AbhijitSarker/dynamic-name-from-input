<?php


/**
 * Plugin Name: Multistep Form
 * Plugin URI: https://abhijitsarker.github.io/my-portfolio/
 * Description: Custom Multistep Form 
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Abhijit Sarker
 * Author URI: https://abhijitsarker.github.io/my-portfolio/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://example.com/my-plugin/
 * Text Domain: alchemist
 * Domain Path: /languages
 */


/*
{Alchemist} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Alchemist} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Alchemist}. If not, see {URI to Plugin License}.
*/


if (!defined('ABSPATH')) {
    die;
}



function form_user_details()
{
    $user_id = get_current_user_id();
    echo "Hello ";
    echo $user_id;
    $user_info = get_userdata(5);
    echo  $user_info->user_login;
}
add_shortcode('form_user_details', 'form_user_details');
