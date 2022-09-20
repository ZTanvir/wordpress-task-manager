<?php
//Status change draft to published
function status_check(){
    global $post;
    global $wpdb;
    if(isset($_POST['complete'])){

        $wpdb->update( $wpdb->posts,array('post_status'=>'draft'),array('ID'=>$post->ID) );


    }
}
add_action('save_post','status_check' );

?>