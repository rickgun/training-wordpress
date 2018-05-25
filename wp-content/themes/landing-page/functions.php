<?php
function load_css() {
	wp_enqueue_style( 'bootstrap_stylesheet', '/wp-content/themes/landing-page/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'font_awesome_stylesheet', '/wp-content/themes/landing-page/vendor/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'simple_line_icon_stylesheet', '/wp-content/themes/landing-page/vendor/simple-line-icons/css/simple-line-icons.css' );
	wp_enqueue_style( 'landing_page_stylesheet', '/wp-content/themes/landing-page/style.css' );
	wp_enqueue_style( 'landing_page_gfonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' );
	wp_enqueue_script( 'landing_page_jquery', '/wp-content/themes/landing-page/vendor/jquery/jquery.min.js' );
	wp_enqueue_script( 'bootstrap_javascript', '/wp-content/themes/landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js' );
}
add_action( 'wp_enqueue_scripts', 'load_css' );

function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Custom', 'your-theme-domain' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );
?>