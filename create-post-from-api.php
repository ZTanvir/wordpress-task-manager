<?php

/**
 * create-post-from-api.php
 * @author Zahirul Islam Tanvir
 */


function get_data_from_api()
{
    // Test api 
    $request = wp_remote_post('http://localhost/wordpress/wp-json/form/v1/submit');

    if (is_wp_error($request)) {
        return false;
    }

    $body = wp_remote_retrieve_body($request);
    $data = $body;
//    $data = json_decode($body);

    // 
    if (!empty($data)) {
        echo $data;
    } else {
        echo "Data not received";
    }

    // Gather post data.
    $create_post = array(
        // api title
        'post_title' => 'Title',
        // api content
        'post_content' => 'description',
        // 'post_status'   => 'publish',
        // 'post_author'   => 1,
        'post_category' => array(8, 39),
        // Custom post type task
        'post_type' => 'Task'

    );
    // Insert the post into the database.
    wp_insert_post($create_post);
}

add_action('wp_head', 'get_data_from_api');


