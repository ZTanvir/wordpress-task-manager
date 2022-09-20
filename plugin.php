<?php
/**
 * Plugin Name:       Task Manager
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Assign task to individual
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Codexpert Intern
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 */

function custom_post_type()
{

    $labels = array(
        'name' => _x('Tasks', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Task', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Task', 'text_domain'),
        'name_admin_bar' => __('Post Type', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('All Items', 'text_domain'),
        'add_new_item' => __('Add New Task', 'text_domain'),
        'add_new' => __('Add New', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Item', 'text_domain'),
        'update_item' => __('Update Item', 'text_domain'),
        'view_item' => __('View Item', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search Item', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Task', 'text_domain'),
        'description' => __('Task Manager', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-list-view'
    );
    register_post_type('Task', $args);

}

add_action('init', 'custom_post_type', 0);


/*****                  USER META BOX              ***** */

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
