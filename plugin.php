 
 <?php

function wporg_add_custom_box() {
   // global $post;
    //echo $post->ID;
    $user_id = get_current_user_id();
    if($user_id==1  )
    {
		add_meta_box(
			'wporg_box_id',                 
			'User Box',       
			'wporg_custom_box_html',   
			'task'                       
		);
    } 
	}
    add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

function wporg_custom_box_html() {
    ?> <button> Complete</button><?php
}
 
?>

