<?php
	/*
	Plugin Name: Team Members
	Plugin URI: http://wp.tutsplus.com/
	Description: Declares a plugin that will create a custom post type displaying team members.
	Version: 1.0
	Author: Sie Ricky Gunawan Setya
	Author URI: http://example.com/
	License: GPLv2
	*/

	global $post;
	function create_team_member() {
	    register_post_type( 'team_members',
	        array(
	            'labels' => array(
					'name'               => 'Team Members',
					'singular_name'      => 'Team Member',
					'add_new'            => 'Add New',
					'add_new_item'       => 'Add New Team Member',
					'edit'               => 'Edit',
					'edit_item'          => 'Edit Team Member',
					'new_item'           => 'New Team Member',
					'view'               => 'View',
					'view_item'          => 'View Team Member',
					'search_items'       => 'Search Team Members',
					'not_found'          => 'No Team Members found',
					'not_found_in_trash' => 'No Team Members found in Trash',
					'parent'             => 'Parent Team Member'
	            ),
				'public'        => true,
				'menu_position' => 15,
				'supports'      => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
				'taxonomies'    => array( '' ),
				'menu_icon'     => plugins_url( 'img/16x16.png', __FILE__ ),
				'has_archive'   => true
	        )
	    );
	}

	function prefix_register_team_member_meta_boxes( $meta_boxes ) {
		$prefix = 'team_member_';
	    $meta_boxes[] = array(
			'id'         => 'personal',
			'title'      => 'Personal Information',
			'post_types' => 'team_members',
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
	            array(
	                'id'   => $prefix . 'position',
	                'name' => 'Position',
	                'type' => 'text',
	            ),
	            array(
	                'id'   => $prefix . 'email',
	                'name' => 'Email',
	                'type' => 'email',
	            ),
	            array(
	                'id'   => $prefix . 'phone',
	                'name' => 'Phone',
	                'type' => 'text',
	            ),
	            array(
	                'id'   => $prefix . 'website',
	                'name' => 'Website',
	                'type' => 'text',
	            ),
	            array(
	                'id'   => $prefix . 'image',
	                'name' => 'Image',
	                'type' => 'image',
	            ),
	        ),
	    );
	    return $meta_boxes;
	}

	function team_member($atts) {
		if ($atts['position'])
			echo 'Position: ' . get_post_meta( get_the_ID(), 'team_member_position', true ) . '<br>';
		if ($atts['email'])
			echo 'Email: ' . get_post_meta( get_the_ID(), 'team_member_email', true ) . '<br>';
		if ($atts['phone'])
			echo 'Phone: ' . get_post_meta( get_the_ID(), 'team_member_phone', true ) . '<br>';
		if ($atts['website'])
			echo 'Website: ' . get_post_meta( get_the_ID(), 'team_member_website', true ) . '<br>';
		if ($atts['image']) {
			$dir = wp_upload_dir(null, false);
	        echo '
	            <div class="img-circle img-responsive">
	                <center><img src="' . $dir['baseurl'] . '/' . get_post_meta( get_post_meta( get_the_ID(), 'team_member_image', true ), '_wp_attached_file', true ) . '" style="width:200px; height:200px"></center>
	            </div>
	        ';
		}
	}

	add_action( 'init', 'create_team_member' );
	add_action( 'init', 'prefix_enqueue' );
	add_shortcode('team_member', 'team_member');
	add_filter( 'rwmb_meta_boxes', 'prefix_register_team_member_meta_boxes' );
?>