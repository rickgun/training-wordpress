<?php
 /*
 Template Name: New Template
 Template Post Type: team_members
 */
global $post;
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
    <?php
    $mypost = array( 'post_type' => 'team_members', );
    $loop = new WP_Query( $mypost );
    ?>
        <div class="row">
        <?php while ( $loop->have_posts() ) :
            $loop->the_post();
        ?>
            <div class="col-lg-4 text-center">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
         
                        <!-- Display featured image in right-aligned floating div -->
                        <div style="float: right; margin: 10px">
                            <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                        </div>
         
                        <!-- Display Title and Author Name -->
                        <?php
                        $dir = wp_upload_dir(null, false);
                        echo '
                                <div class="img-circle img-responsive">
                                    <center><img src="' . $dir['baseurl'] . '/' . get_post_meta( get_post_meta( $post->ID, 'team_member_image', true ), '_wp_attached_file', true ) . '" style="width:200px; height:200px"></center>
                                </div>
                        ';
                        ?>
                            <br />
                        <h2 style="text-transform: uppercase;"><strong><?php the_title();?></strong></h2>
                        <h3><strong><?php echo esc_html( get_post_meta( $post->ID, 'team_member_position', true ) ); ?></strong></h3>
                            <br />
                        <strong>Email: </strong>
                            <?php echo get_post_meta( $post->ID, 'team_member_email', true ); ?>
                            <br />
                        <strong>Phone: </strong>
                            <?php echo get_post_meta( $post->ID, 'team_member_phone', true ); ?>
                            <br />
                        <strong>Website: </strong>
                            <?php echo get_post_meta( $post->ID, 'team_member_website', true ); ?>
                            <br />
                    </header>
     
                    <!-- Display movie review contents -->
                    <div class="entry-content"><?php the_content(); ?></div>
                </article>
            </div>
     
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>