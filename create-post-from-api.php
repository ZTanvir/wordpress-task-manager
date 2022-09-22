<?php

/**
 * create-post-from-api.php
 * @author Zahirul Islam Tanvir
 */


function get_data_from_api(){
    // Test api 
    $request = wp_remote_get( 'https://pippinsplugins.com/edd-api/products' );

    if( is_wp_error( $request ) ) {
        return false;
    }

    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );

    // 
    if( ! empty( $data ) ) {
    
        echo '<ul>';
        foreach( $data->products as $product ) {
            echo '<li>';
                //echo '<a href="' . esc_url( $product->info->link ) . '">' . $product->info->title . '</a>';
                echo $product->info->title;
            echo '</li>';
        }
        echo '</ul>';
    }
}

add_action('wp_head', 'get_data_from_api');

?>
