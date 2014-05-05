<?php
/*
Plugin Name: Font Sizer
Plugin URI: https://github.com/awhedbee22/
Description: A Wordpress plugin that will create a widget for users to resize the font-size on the webpage.
Version: 1.0
Author: Alex Whedbee
Author URI: http://alexwhedbee.com/
License: MIT.
*/

class font_sizer extends WP_Widget {

    // Constructor
    function font_sizer() {
        parent::WP_Widget(false, $name = __('Font Sizer', 'Frontend font sizer widget') );
    }

    // Widget Customization
    function form($instance) { 
        //Check Values
        // if( $instance) {
        //     $title = esc_attr($instance['title']);
        // } else {
        //     $title = '';
        // }
    ?>
        <!--###############
        Widget Menu Options
        ################-->
        <p>
            No options to configure.
        </p>
    <?php
    }


    // Widget Update
    function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      //$instance['title'] = strip_tags($new_instance['title']);
     return $instance;
}


    // Widget Display
    function widget($args, $instance) {
        //Call the css & js
        wp_enqueue_style( 'widget-style', plugins_url('wp-font-sizer-widget/wp-font-sizer-widget.css') );
        wp_enqueue_script( 'widget-script', plugins_url('wp-font-sizer-widget/wp-font-sizer-widget.js') );
        
        extract( $args );
        // Widget Option
        //$title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        // Display Widget

        echo '<div class="widget-text wp_widget_plugin_box">';

        // Check if title is set

        // if ( $title ) {

        //   echo $before_title . $title . $after_title;

        // }
        // Check if text is set
        include 'view.php';
        echo '</div>';
        echo $after_widget;
    }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("font_sizer");'));
?>