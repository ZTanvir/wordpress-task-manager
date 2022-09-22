 <!DOCTYPE html>
 <html lang="en">
 <head> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
 </head>
 <body>
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
    <input type = "checkbox" id = "checkbox">        
 <?php
}
function status_check2(){?>
  
<script>
let checkbox = document.getElementById("checkbox");
checkbox.addEventListener( "change", () => {
   if ( checkbox.checked ) {
      jQuery.ajax({
       url: 'http://wordpress/wp-admin/admin-ajax.php',
       data : { action: "my_user_vote" },
       type: 'post',
       dataType : "json"
      });
   }  
});
</script><?php
}
add_action('save_post','status_check2' );

function my_user_vote() {
    global $post;
    global $wpdb;
    $wpdb->update( $wpdb->posts,array('post_status'=>'draft'),array('ID'=>$post->ID) );
 
}
?>

 </body>
 </html>