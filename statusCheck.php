<?php


add_action("admin_init","custom_metabox");

function custom_metabox(){
    add_meta_box("custom_metabox_01","Custom Metabox","custom_metabox_field","task","normal","low");

}
function custom_metabox_field(){
    echo '<form method="post" action="display()">
    <input type="submit" name="custom_input" id="custom_input" value="submit"/></form>'
    ;
}


/*
A faster solution is:

$post = array( 'ID' => $post_id, 'post_status' => $status );
wp_update_post($post);




Hey Daemon can you please check below code?

$get_post = get_post( $post_id, 'ARRAY_A' );
$get_post['post_status'] = $status;
wp_update_post($get_post);
If it does not work then can you please try this function

wp_publish_post()


Here is a function that changes post status

/*
$post_id - The ID of the post you'd like to change.
$status -  The post status publish|pending|draft|private|static|object|attachment|inherit|future|trash.
*/
/*
function change_post_status($post_id,$status){
    $current_post = get_post( $post_id, 'ARRAY_A' );
    $current_post['post_status'] = $status;
    wp_update_post($current_post);
}
simple call the function and pass the post id and the new status you want it to have for example:

change_post_status(12,'private');*/














      
?>