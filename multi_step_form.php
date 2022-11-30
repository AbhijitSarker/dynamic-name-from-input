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


if (!defined('ABSPATH')) {
    die;
}


function form_user_details()
{
    $user = (isset($_POST['username']) ? $_POST['username'] : '');
    $pass = (isset($_POST['password']) ? $_POST['password'] : '');
    $email = (isset($_POST['email']) ? $_POST['email'] : '');

    if (!username_exists($user)  && !email_exists($email)) {
        $user_id = wp_create_user($user, $pass, $email);
        if (!is_wp_error($user_id)) {
            //user has been created
            $user = new WP_User($user_id);
            $user->set_role('do');
            //Redirect
            wp_redirect('#');
            exit;
        } else {
            //$user_id is a WP_Error object. Manage the error
        }
    } else {
        // user exist
    }








    // $user_id = wp_create_user($username, $password, $email);

    // $args = array(
    //     'post_type'   => 'pafe-form-database',
    //     'posts_per_page' => -1,
    // );

    // $scheduled = new WP_Query($args);

    // if ($scheduled->have_posts()) {
    //     while ($scheduled->have_posts()) {
    //         echo 'hello';
    //         $post_name = $scheduled->the_post();
    //         $post_id = get_the_ID();
    //         $post_author_id = get_the_author_ID();
    //         $current_user_id = get_current_user_id();

    //         if ($post_id == $current_user_id) {
    //             echo $post_id;
    //             var_dump($post_id);
    //         }
    //     }
    //     wp_reset_postdata();
    // }



    // add_filter('authenticate', 'nop_auto_login', 3, 10);

    // function nop_auto_login($user, $username, $password)
    // {
    //     if (!$user) {
    //         $user = get_user_by('email', $username);
    //     }
    //     if (!$user) {
    //         $user = get_user_by('login', $username);
    //     }

    //     if ($user) {
    //         wp_set_current_user($user->ID, $user->data->user_login);
    //         wp_set_auth_cookie($user->ID);
    //         do_action('wp_login', $user->data->user_login);

    //         wp_safe_redirect(admin_url());
    //         exit;
    //     }
    // }

}
add_shortcode('form_user_details', 'form_user_details');
