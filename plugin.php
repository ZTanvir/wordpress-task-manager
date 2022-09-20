<?php
function wporg_add_custom_box()
{
    global $post;
    $current_user_id = get_current_user_id();
    $assigned_user_id = get_post_meta($post->ID, 'assigned_user_id', true);
    if ($assigned_user_id == $current_user_id) {
        add_meta_box(
            'wporg_box_id',
            'User Box',
            'wporg_custom_box_html',
            'task'
        );
    }
}

add_action('add_meta_boxes', 'wporg_add_custom_box');

function wporg_custom_box_html() {

    ?>
    <form method="post">
        <input type="submit" name="complete"
                value="Complete"/>
          
 <?php
}
?>
