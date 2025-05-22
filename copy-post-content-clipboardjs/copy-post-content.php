<?php

/**
 * Plugin Name: Copy Post Content with ClipboardJS
 * Plugin URI: https://ibrahimhossen.dev
 * Description: A simple plugin to copy the content of a post to the clipboard.
 * Version: 1.0
 * Author: Ibrahim Hossen
 * Author URI: https://ibrahimhossen.dev
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: copy-post-content
 * Domain Path: /languages
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class CopyPostContent{
    public function __construct(){
        add_filter( 'the_content', array( $this, 'cpc_add_copy_button' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'cpc_enqueue_scripts' ) );
    }

    // Add button to the post content
    public function cpc_add_copy_button($content){
        if(is_single()){
           $wrapper_content = '<div id="cpc_wrapper_text" class="cpc-wrapper">' . $content . '</div>';
           $button = '<button data-clipboard-target="#cpc_wrapper_text" class="cpc-button">Copy Post</button>';  

           return $wrapper_content . $button;
        }
    }

    // Enqueue scripts and styles
    public function cpc_enqueue_scripts(){

        if( !is_single() ){
            return;
        }
        wp_enqueue_style( 'cpc-style', plugin_dir_url( __FILE__ ) . 'assets/css/cpc-style.css' );
        wp_enqueue_script( 'clipboard-js', 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js', [], '2.0.6', true );
        wp_enqueue_script( 'cpc-script', plugin_dir_url( __FILE__ ) . 'assets/js/cpc-main.js', [], '1.0', true );
    }


}

new CopyPostContent();

