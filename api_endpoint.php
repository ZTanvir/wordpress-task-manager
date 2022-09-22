<?php

add_action('rest_api_init', "register_rest_api");

function register_rest_api()
{
    register_rest_route('form/v1', 'submit', array(
        'methods' => 'POST',
        'callback' => 'my_awesome_func'
    ));
}

function my_awesome_func()
{

}

?>