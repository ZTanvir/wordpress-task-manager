<?php
/**
 * send-mail.php
 * @author Zahirul Islam Tanvir
 */

// Send mail to team - about task
function send_mail(){
    // Post url
    global $wp;
    $current_url = get_edit_post_link($post->ID);

    // Set $to as the email you want to send the test to
    $to = "lightmahmud@gmail.com";

    // Email subject and body text
    $subject = 'Your task for today';
    // Todo the message need to web link
    $message = '<a href="$current_url">Task</a>';
    $headers = '';

    // Call the wp_mail function, display message based on the result.
    if( wp_mail( $to, $subject, $message, $headers ) ) {
    // the message was sent...
        echo 'The test message was sent. Check your email inbox.';
    } else {
    // the message was not sent...
        echo 'The message was not sent!';
    };
}
// add_action('init', 'send_mail', 0);


?>