<?php

// Add Custom Metabox to Select User
function custom_metabox()
{
    add_meta_box(
        'custom_metabox_01',
        'Select User',
        'metabox_field',
        'task'
    );
}

function metabox_field()
{
    global $post;
    $assigned_user_id = get_post_meta($post->ID, 'assigned_user_id', true);

    $args = array(
        'role' => '',
        'orderby' => 'user_nicename',
        'order' => 'ASC'
    );
    $users = get_users($args);

    if (get_current_user_id() == 1) {
        echo '<select name="select_user">';
        echo '<option>--- Select User ---</option>';
        foreach ($users as $user) {
            echo '<option value="' . $user->ID . '"' . ($assigned_user_id == $user->ID ? 'selected' : '') . '>' . $user->display_name . '</option>';
        }
        echo '</select>';
    }

//    echo '<br/>';
//    echo 'User ID: ' . get_post_meta($post->ID, 'assigned_user_id', true);
//    echo '<br/>';
//    echo 'Post ID: ' . $post->ID;
}

add_action('admin_init', 'custom_metabox');

function save_custom_metabox()
{
    global $post;

    if (isset($_POST["select_user"])):
        //  Save Metabox Data
        update_post_meta(
            $post->ID,
            'assigned_user_id', /* Meta Key for assigned user ID */
            $_POST["select_user"]
        );
    endif;
}

add_action('save_post', 'save_custom_metabox');