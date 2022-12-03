<?php

/**
 * Plugin Name: show form data
 * Plugin URI: https://github.com/AbhijitSarker
 * Description: show form data by user
 * Version: 1.0
 * Author: Abhijit
 * Author URI: https://github.com/AbhijitSarker
 * Developer: Mahmud Haisan
 * Developer URI: https://github.com/AbhijitSarker
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


    wp_enqueue_style('flickity_style', PLUGINS_PATH_ASSETS . 'css/flickity.css');
    wp_enqueue_style('slider_bootstrap', PLUGINS_PATH_ASSETS . 'css/bootstrap.min.css');
    wp_enqueue_style('slider_style', PLUGINS_PATH_ASSETS . 'css/slider.css');
    // wp_enqueue_script('random493_bootstrap', PLUGINS_PATH_ASSETS . 'js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('flickity_script', PLUGINS_PATH_ASSETS . 'js/flickity.pkgd.js', array('jquery'), false, true);
    wp_enqueue_script('random493_script_jquery', PLUGINS_PATH_ASSETS . 'js/script.js', array('jquery'), false, true);
    wp_enqueue_script('slider_script_jquery', PLUGINS_PATH_ASSETS . 'js/slider_script.js', array('jquery'), false, true);

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
add_shortcode('show_slider', 'show_slider_func');

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

function show_slider_func()
{
    echo $_SESSION['form_field_person'];
?>
    <div class="slider ml-lg-5 ml-md-5 mt-5 py-lg-5">
        <div class="row">
            <div class="col-md-4">
                <div class="imgContainer ml-lg-n5 mt-lg-0 mt-md-0 ml-md-n5 mt-n5">
                    <div class="image">
                        <img src="1.png" />
                    </div>
                    <div class="image">
                        <img src="2.png" />
                    </div>
                    <div class="image">
                        <img src="3.png" />
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- slider -->
                <div id="product<a href=" https://www.jqueryscript.net/slider/">
                    <a class="carousel slide carousel-fade pr-lg-5 py-lg-0 py-4" data-ride="carousel">Slider</a>"

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="content">
                                <div class="<a href=" https://www.jqueryscript.net/time-clock/">date</a>">
                                    26 December 2019
                                </div>
                                <div class="title">
                                    Lorem ipsum dolor - one
                                </div>
                                <div class="desc">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Error itaque, libero dignissimos nihil aliquam
                                    eveniet tenetur cupiditate consectetur quod modi
                                    repellendus veniam, repellat iusto fugiat temporibus
                                    officia facere nulla nam.
                                </div>
                                <div class="d-flex justify-content-center justify-content-lg-start">
                                    <button class="btn readMoreBtn">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="content">
                                <div class="date">
                                    26 December 2019
                                </div>
                                <div class="title">
                                    Lorem ipsum dolor - two
                                </div>
                                <div class="desc">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Error itaque, libero dignissimos nihil aliquam
                                    eveniet tenetur cupiditate consectetur quod modi
                                    repellendus veniam, repellat iusto fugiat temporibus
                                    officia facere nulla nam.
                                </div>
                                <div class="d-flex justify-content-center justify-content-lg-start">
                                    <button class="btn readMoreBtn">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="content">
                                <div class="date">
                                    26 December 2019
                                </div>
                                <div class="title">
                                    Lorem ipsum dolor -three
                                </div>
                                <div class="desc">
                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Error itaque, libero dignissimos nihil aliquam
                                    eveniet tenetur cupiditate consectetur quod modi
                                    repellendus veniam, repellat iusto fugiat temporibus
                                    officia facere nulla nam.
                                </div>
                                <div class="d-flex justify-content-center justify-content-lg-start">
                                    <button class="btn readMoreBtn">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- indicators -->
                    <ol class="carousel-indicators indicators">
                        <li data-target="#productSlider" data-slide-to="0" class="active"></li>
                        <li data-target="#productSlider" data-slide-to="1"></li>
                        <li data-target="#productSlider" data-slide-to="2"></li>
                    </ol>
                    <!-- indicators -->
                </div>
                <!-- slider -->
            </div>
        </div>
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
