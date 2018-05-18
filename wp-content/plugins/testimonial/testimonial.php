<?php
/*
Plugin Name: User Testimonial
Plugin URI: http://example.com
Description: Simple non-bloated WordPress Contact Form
Version: 1.0
Author: Sie Ricky Gunawan Setya
Author URI: http://example.com
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, no direct call please.';
	exit;
}

define( 'TESTIMONIAL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( TESTIMONIAL__PLUGIN_DIR . 'class.testimonial-widget.php' );

function testimonial_submit_form()
{
	global $wpdb;

    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {

        // sanitize form values
		$name        = sanitize_text_field( $_POST["cf-name"] );
		$email       = sanitize_email( $_POST["cf-email"] );
		$phone       = sanitize_text_field( $_POST["cf-phone"] );
		$testimonial = nl2br(esc_textarea( $_POST["cf-testimonial"] ));

        // insert data into database
        if (
        	$wpdb->insert(
	        	'wp_user_testimonial',
	        	array(
					'name'        => $name,
					'email'       => $email,
					'phone'       => $phone,
					'testimonial' => $testimonial
	        	),
	        	array(
	        		'%s',
	        		'%s',
	        		'%s',
	        		'%s'
	        	)
	        )
        ) {
        	echo '<div class="alert alert-success">Your form has been submitted</div>';
        }
        else
        {
        	echo '<div class="alert alert-danger">There has been something wrong.</div>';
        }

    }
}

function testimonial_delete_data($id = 0)
{
	global $wpdb;

    // if the submit button is clicked, send the email
    if ( ! empty( $id ) )
    {
        // delete data into database
        if (
        	$wpdb->delete(
	        	'wp_user_testimonial',
	        	array(
					'id' => $id
	        	),
	        	array(
	        		'%d'
	        	)
        	)
        ) {
        	echo '<div class="alert alert-success">Data has been successfully deleted.</div>';
        }
        else
        {
        	echo '<div class="alert alert-danger">There has been something wrong, please try again.</div>';
        }
    }
}

function testimonial_html_form_code()
{
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Your Name (required) <br />';
    echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="50" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Email (required) <br />';
    echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="50" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Phone Number (required) <br />';
    echo '<input type="text" name="cf-phone" pattern="[0-9 ]+" value="' . ( isset( $_POST["cf-phone"] ) ? esc_attr( $_POST["cf-phone"] ) : '' ) . '" size="15" />';
    echo '</p>';
    echo '<p>';
    echo 'Your Testimonial (required) <br />';
    echo '<textarea rows="10" cols="35" name="cf-testimonial">' . ( isset( $_POST["cf-testimonial"] ) ? esc_attr( $_POST["cf-testimonial"] ) : '' ) . '</textarea>';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Send"/></p>';
    echo '</form>';
}

function testimonial_example_admin_page()
{
	global $wpdb;

	if ($_GET['action'] == 'delete' && $_GET['id'] != 0)
	{
		testimonial_delete_data($_GET['id']);
	}

	$testimonials = $wpdb->get_results("SELECT * FROM $wpdb->user_testimonial");
	?>
	<div class="wrap">
		<h2>User Testimonial</h2>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Testimonial</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				foreach ($testimonials as $testimony)
				{
					echo '<tr>';
					echo '<td>' . $testimony->name . '</td>';
					echo '<td>' . $testimony->email . '</td>';
					echo '<td>' . $testimony->phone . '</td>';
					echo '<td>' . $testimony->testimonial . '</td>';
					echo '<td><a href="' . strtok($_SERVER["REQUEST_URI"],'&') . '&action=delete&id=' . $testimony->id . '"> Delete </a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}

add_shortcode( 'testimonial_example_contact_form', 'cf_shortcode' );

add_action( 'admin_menu', 'cf_admin_menu' );

function cf_shortcode()
{
	ob_start();
	testimonial_submit_form();
	testimonial_html_form_code();

	return ob_get_clean();
}

function cf_admin_menu() {
	add_menu_page( 'Example User Testimonial', 'User Testimonial', 'manage_options', 'example-contact-form/testimonial_example_admin_page.php', 'testimonial_example_admin_page', 'dashicons-tickets', 6  );
}
?>