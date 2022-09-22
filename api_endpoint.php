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
//        Create New Task
        $create_post = array(
            'post_title' => $title,
            'post_content' => $description,
            'post_type' => 'task'

        );
        $new_task_id = wp_insert_post($create_post);

//      Send mail to Admin
        $admin_email = get_option('admin_email');

        $to = "" . $admin_email;
        $subject = 'New Task Alert';
        $body = 'New task created please assign a new user';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        wp_mail($to, $subject, $body, $headers);

//        API Response
        $data['status'] = 'OK';
        $data['message'] = "task created successfully";
        $data['task_id'] = $new_task_id;

    } else {
        $data['status'] = 'Failed';
        $data['message'] = 'Data Missing';
    }

    return $data;
}

