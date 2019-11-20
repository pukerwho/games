<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
require_once get_template_directory() . '/inc/custom-fields/pages-meta.php';
require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
require_once get_template_directory() . '/inc/TGM/example.php';
require_once get_template_directory() . '/inc/rating/backend.php';

register_nav_menus( array(
    'head_menu' => 'Меню в шапке',
    'footer_menu' => 'Меню в подвале',
) );

// Register sidebars
function registerThemeSidebars() {
    if( !function_exists( 'register_sidebar' ) ) {
        return;
    }
    register_sidebar( array(
        'name' => 'Main sidebar',
        'id' => 'main-sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'registerThemeSidebars' );
function addAdminEditorStyle() {
    add_editor_style( get_stylesheet_directory_uri() . 'css/editor-style.css' );
};
// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css', false, time() );
    wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', '','',true);
    wp_enqueue_script( 'animate-puk', get_template_directory_uri() . '/js/animate-puk.js','','',true);
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', '','',true);
};

//подключаем стили к админке
function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; 
    $args['post_status'] = 'publish';
 
   
    query_posts( $args );
 
    if( have_posts() ) :
 
        
        while( have_posts() ): the_post();
            get_template_part( 'blocks/default/loop', 'default' );
        
        endwhile;
 
    endif;
    die; 
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); 

// add_action('init', 'rating_default');

// function rating_default() {
//     global $wpdb;
//     $wpdb->update(
//         'wp_termmeta', 
//         array(
//             'meta_value' => 5,
//         ),
//         array(
//             'meta_key' => '_crb_cats_rating',
//         ),
//     );
//     $wpdb->update(
//         'wp_termmeta', 
//         array(
//             'meta_value' => 1,
//         ),
//         array(
//             'meta_key' => '_crb_cats_rating_count',
//         ),
//     );
// }