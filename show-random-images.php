<?php

/**
 * Plugin Name: show form data
 * Plugin URI: http://mahmudhaisan.com/
 * Description: show form data by user
 * Version: 1.0
 * Author: Mahmud haisan
 * Author URI: https://github.com/mahmudhaisan
 * Developer: Mahmud Haisan
 * Developer URI: https://github.com/mahmudhaisan
 * Text Domain: random493
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    die;
}

define("PLUGINS_PATH", plugin_dir_path(__FILE__));
define("PLUGINS_URL", plugins_url(__FILE__));
define("PLUGINS_PATH_ASSETS", plugin_dir_url(__FILE__) . 'assets/');


function load_plugin_scripts($hook_suffix)
{


    //     wp_enqueue_style('random493_bootstrap', PLUGINS_PATH_ASSETS . 'css/bootstrap.min.css');
    wp_enqueue_style('flickity_style', PLUGINS_PATH_ASSETS . 'css/flickity.css');
    //     wp_enqueue_script('random493_bootstrap', PLUGINS_PATH_ASSETS . 'js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('flickity_script', PLUGINS_PATH_ASSETS . 'js/flickity.pkgd.js', array('jquery'), false, true);
    wp_enqueue_script('random493_script_jquery', PLUGINS_PATH_ASSETS . 'js/script.js', array('jquery'), false, true);

    wp_localize_script(
        'random493_script_jquery',
        'ajax_scripts',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
}
add_action('init', 'load_plugin_scripts');


function register_my_session()
{
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'register_my_session');


function show_form_data()
{
    global $post;
    $slug = $post->post_name;

    //         echo (session_id());
    $session_user_name =  $_SESSION['user_name'];
    echo $session_user_name;
}

add_shortcode('form_data_values', 'show_form_data');
add_shortcode('form_person_info', 'form_person_info_func');

function form_person_info_func()
{
    echo $_SESSION['form_field_person'];
?>

    <div class="carousel">

        <div class="carousel-cell">Slide 1</div>

        <div class="carousel-cell">Slide 2</div>

        <div class="carousel-cell">Slide 3</div>


    </div>

<?php
}


add_action('wp_ajax_form_value_generator_final', 'form_value_generator_final');
add_action('wp_ajax_nopriv_form_value_generator_final', 'form_value_generator_final');


function form_value_generator_final()
{
    $input_name_field_value = $_POST['input_name_field_value'];
    $url_last_part = $_POST['url_last_part'];

    $form_field_person = $_POST['form_field_person'];

    if ($url_last_part == 'fill-form') {
        if (!session_id()) {
            session_start();
        }
    }


    $_SESSION['user_name'] = $input_name_field_value;
    $_SESSION['form_field_person'] = $form_field_person;
    // 	echo $_SESSION['user_name'];





    wp_die();
}
