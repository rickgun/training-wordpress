<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				$dir = wp_upload_dir(null, false);
		        echo '
		            <div class="img-circle img-responsive">
		                <center><img src="' . $dir['baseurl'] . '/' . get_post_meta( get_post_meta( get_the_ID(), 'team_member_image', true ), '_wp_attached_file', true ) . '" style="width:200px; height:200px"></center>
		            </div>
		        ';
				echo 'Position: ' . get_post_meta( get_the_ID(), 'team_member_position', true ) . '<br>';
				echo 'Email: ' . get_post_meta( get_the_ID(), 'team_member_email', true ) . '<br>';
				echo 'Phone: ' . get_post_meta( get_the_ID(), 'team_member_phone', true ) . '<br>';
				echo 'Website: ' . get_post_meta( get_the_ID(), 'team_member_website', true ) . '<br>';
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
