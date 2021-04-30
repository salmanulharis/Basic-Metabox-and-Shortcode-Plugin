<?php
/**
 * Plugin Name:       Basic Shortcode Plugin
 * Description:       basic shortcode plugin
 * Version:           1.0.0
 * Author:            salman
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
function shortcode_funct($atts){
  $a = shortcode_atts(array(
    'name' => 'My Name',
    'age' => '30',
  ), $atts);
  // return $a['name'] . "<br>" . $a['age'];
  ?>
  <h2>My name is: <?php echo $a['name']; ?></h2>
  <h4>My age is: <?php echo $a['age']; ?></h4>

  <?php
}
add_shortcode('myshortcode', 'shortcode_funct');

?>
