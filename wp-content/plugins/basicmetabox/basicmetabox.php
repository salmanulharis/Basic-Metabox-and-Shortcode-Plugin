<?php
/**
 * Plugin Name:       Basic Metabox Plugin
 * Description:       basic metabox plugin
 * Version:           1.0.0
 * Author:            salman
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

//function to add meta box
function user_text_add_meta_box(){
  add_meta_box('user_text', 'User Text', 'user_text_callback_function', 'post', 'side');
}

//callback funtion for adding mettabox
function user_text_callback_function( $post ){
  //adding nonce for security
   wp_nonce_field('save_text_data_function', 'user_text_meta_box_nonce');
   wp_nonce_field('save_checkbox_data-function', 'user_text_checkbox_meta_box_nonce');

   //getting post meta data values
   $value = get_post_meta($post->ID, '_user_text_value_key', true);
   $value_checkbox = get_post_meta($post->ID, '_user_text_checkbox_key', true);
   //html to show the metabox
    echo '<div>
           <label for="user_text_field">User Text</label>
           <input type="text" id="user_text_field" name="user_text_field" value="' . esc_attr( $value ) . '" size="25" />';
           //condition to hold the checked or not condition for the checkbox
            if($value_checkbox == ""){
              echo '<input id="user_text_checkbox" name="user_text_checkbox" type="checkbox" value="true">';
            }
            else if($value_checkbox == "true"){
              echo '<input id="user_text_checkbox" name="user_text_checkbox" type="checkbox" value="true" checked>';
            }
           echo '<div>
                  <label for="user_text_checkbox">Show on post?</label>
                </div>
         </div>';
    }
//action to create and add meta box
add_action('add_meta_boxes', 'user_text_add_meta_box');

//function to save the datas from the metabox
function save_text_data_function( $post_id ){
  //checking the nonce
  if( ! isset($_POST['user_text_meta_box_nonce'])){
    return;
  }
  //verifying the nonce
  if( ! wp_verify_nonce($_POST['user_text_meta_box_nonce'], 'save_text_data_function')){
    return;
  }
  //verifying if it is outer save or manual save
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
    return;
  }
  //checking whether the user allowed to edit the post
  if( ! current_user_can('edit_post', $post_id)){
    return;
  }
  //checking if there anithing the text field
  if(! isset($_POST['user_text_field'])){
    return;
  }
  //collecting, sanitizing, updating the text field value
  $user_data = sanitize_text_field($_POST['user_text_field']);
  update_post_meta($post_id, '_user_text_value_key', $user_data);
  //collecting, sanitizing, updating the checkbox value
  $user_data_checkbox = sanitize_text_field($_POST['user_text_checkbox']);
  update_post_meta($post_id, '_user_text_checkbox_key', $user_data_checkbox);
}
//action to save the post
add_action('save_post', 'save_text_data_function');

//function to display the saved post in accordance with the value of checkbox
function show_content_in_page( $content ) {
    global $post;
    $notice = "";
    //getting the value of checkbox
    $custom_checkbox = get_post_meta($post->ID, '_user_text_checkbox_key', true);
    //checking if checkbox is checked or not?
    if($custom_checkbox == "true"){
      // retrieve the global notice for the current post
      $global_notice = esc_attr(get_post_meta( $post->ID, '_user_text_value_key', true ) );
      $notice = "<div class='sp_global_notice'>$global_notice</div>";
    }
    return $content . $notice;
}
//filtering the content to show in site
add_filter('the_content', 'show_content_in_page');


//function to show the errors
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
