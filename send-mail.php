<?php
/**
 * send-mail.php
 * @author Zahirul Islam Tanvir
 */

// Send mail to team - about task
function my_project_updated_send_email($post_id)
{
    // Send mail to this user-
    $assigned_user_id = get_post_meta($post_id, 'assigned_user_id', true);
    global $assigned_user_email;
    $args = array(
        'role' => '',
        'orderby' => 'user_nicename',
        'order' => 'ASC'
    );

    $users = get_users($args);
    foreach ($users as $user) {
        if ($user->ID == $assigned_user_id) {
            $assigned_user_email = $user->user_email;
            break;
        }
    }
    if (wp_is_post_revision($post_id)) {
        return;
    }

    $post_title = get_the_title($post_id);
    $post_url = get_edit_post_link($post_id);
    $subject = 'Your task for today';
    $message = "Click on the link to view your task:\n\n";
    $message .= $assigned_user_email . ": " . $post_url;
    $user_email = "" . $assigned_user_email;

    // Send email to user_email.
    wp_mail($user_email, $subject, $message);
}

add_action('save_post', 'my_project_updated_send_email');
?>