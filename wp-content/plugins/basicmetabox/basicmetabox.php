<?php
/**
 * Plugin Name:       Basic Metabox Plugin
 * Description:       basic metabox plugin
 * Version:           1.0.0
 * Author:            salman
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */


function user_text_add_meta_box(){
  add_meta_box('user_text', 'User Text', 'user_text_callback_function', 'post', 'side');
}

function user_text_callback_function( $post ){
   wp_nonce_field('save_text_data_function', 'user_text_meta_box_nonce');
   wp_nonce_field('save_checkbox_data-function', 'user_text_checkbox_meta_box_nonce');

   $value = get_post_meta($post->ID, '_user_text_value_key', true);
   $value_checkbox = get_post_meta($post->ID, '_user_text_checkbox_key', true);
    echo '<div>
           <label for="user_text_field">User Text</label>
           <input type="text" id="user_text_field" name="user_text_field" value="' . esc_attr( $value ) . '" size="25" />';

            if($value_checkbox == ""){
              echo '<input name="user_text_checkbox" type="checkbox" value="true">';
            }
            else if($value_checkbox == "true"){
              echo '<input name="user_text_checkbox" type="checkbox" value="true" checked>';
            }
           echo '<div>
                  <label for="user_text_checkbox">Show on post?</label>
                </div>
         </div>';
    }
add_action('add_meta_boxes', 'user_text_add_meta_box');
function save_text_data_function( $post_id ){

  if( ! isset($_POST['user_text_meta_box_nonce'])){
    return;
  }

  if( ! wp_verify_nonce($_POST['user_text_meta_box_nonce'], 'save_text_data_function')){
    return;
  }

  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
    return;
  }

  if( ! current_user_can('edit_post', $post_id)){
    return;
  }

  if(! isset($_POST['user_text_field'])){
    return;
  }
  $user_data = sanitize_text_field($_POST['user_text_field']);
  update_post_meta($post_id, '_user_text_value_key', $user_data);

  $user_data_checkbox = sanitize_text_field($_POST['user_text_checkbox']);
  update_post_meta($post_id, '_user_text_checkbox_key', $user_data_checkbox);
}
add_action('save_post', 'save_text_data_function');

function show_content_in_page( $content ) {
    global $post;
    $custom_checkbox = get_post_meta($post->ID, '_user_text_checkbox_key', true);
    if($custom_checkbox == "true"){

    // retrieve the global notice for the current post
    $global_notice = esc_attr(get_post_meta( $post->ID, '_user_text_value_key', true ) );


    $notice = "<div class='sp_global_notice'>$global_notice</div>";
    }

    return $content . $notice;

}
add_filter('the_content', 'show_content_in_page');



if (!function_exists('write_log')) {
function write_log ( $log ) {
if ( true === WP_DEBUG ) {
if ( is_array( $log ) || is_object( $log ) ) {
error_log( print_r( $log, true ) );
} else {
error_log( $log );
}
}
}
}
