<?php

add_action('rest_api_init', "register_rest_api");

// Register REST API function
function register_rest_api()
{
    register_rest_route('form/v1', 'submit', array(
        'methods' => 'POST',
        'callback' => 'my_awesome_func'
    ));
}

// Callback function for REST API register
function my_awesome_func($request)
{
    $data = array();
    $title = $request->get_param('title');
    $description = $request->get_param('description');

    if (isset($title) && isset($description)) {
        $data['status'] = 'OK';
        $data ['received_data'] = array(
            'title' => $title,
            'description' => $description
        );
        $data['message'] = "Data sent successfully";
    } else {
        $data['status'] = 'Failed';
        $data['message'] = 'Data Missing';
    }
    
    return $data;
}

