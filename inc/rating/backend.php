<?php 

add_action( 'wp_enqueue_scripts', 'myRating' );
function myRating() {
	wp_register_script( 'rating', get_template_directory_uri() . '/js/rating.js', '','',true);
	wp_localize_script( 'rating', 'rating_params', array(
	  'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
	  'catId' => $custom_query->catId,
	  'categoryRatingCount' => $custom_query->categoryRatingCount,
	  'categoryRatingOld' => $custom_query->categoryRatingOld,
	  'categoryRatingNew' => $custom_query->categoryRatingNew,

	  'postId' => $custom_query->postId,
	  'postRatingCount' => $custom_query->postRatingCount,
	  'postRatingOld' => $custom_query->postRatingOld,
	  'postRatingNew' => $custom_query->postRatingNew,
	  ) );
	wp_enqueue_script( 'rating' );
}

function rating_post(){
	global $wpdb;
  
  $post_id = stripslashes_deep($_POST['postId']);
  $post_rating_new = stripslashes_deep($_POST['postRatingNew']);
  $post_rating_old = stripslashes_deep($_POST['postRatingOld']);
  $post_rating_count = stripslashes_deep($_POST['postRatingCount']);

  $post_rating_count = $post_rating_count + 1;
  $post_rating_old = $post_rating_old + $post_rating_new;

  $wpdb->update(
		'wp_postmeta', 
		array(
			'meta_value' => $post_rating_old,
		),
		array(
			'post_id' => $post_id,
			'meta_key' => '_crb_post_rating',
		),
		array( '%s' ),
		array( // формат для &laquo;где&raquo;
			'%d',
			'%s'
		)
	);

	$wpdb->update(
		'wp_postmeta', 
		array(
			'meta_value' => $post_rating_count,
		),
		array(
			'post_id' => $post_id,
			'meta_key' => '_crb_post_rating_count',
		),
		array( '%s' ),
		array( // формат для &laquo;где&raquo;
			'%d',
			'%s'
		)
	);
}

add_action('wp_ajax_rating_post_back', 'rating_post');
add_action('wp_ajax_nopriv_rating_post_back', 'rating_post');


function rating_category(){
	global $wpdb;
  
  $category_id = stripslashes_deep($_POST['catId']);
  $category_rating_new = stripslashes_deep($_POST['categoryRatingNew']);
  $category_rating_old = stripslashes_deep($_POST['categoryRatingOld']);
  $category_rating_count = stripslashes_deep($_POST['categoryRatingCount']);

  $category_rating_count = $category_rating_count + 1;
  $category_rating_old = $category_rating_old + $category_rating_new;

  $wpdb->update(
		'wp_termmeta', 
		array(
			'meta_value' => $category_rating_old,
		),
		array(
			'term_id' => $category_id,
			'meta_key' => '_crb_cats_rating',
		),
		array( '%s' ),
		array( // формат для &laquo;где&raquo;
			'%d',
			'%s'
		)
	);

	$wpdb->update(
		'wp_termmeta', 
		array(
			'meta_value' => $category_rating_count,
		),
		array(
			'term_id' => $category_id,
			'meta_key' => '_crb_cats_rating_count',
		),
		array( '%s' ),
		array( // формат для &laquo;где&raquo;
			'%d',
			'%s'
		)
	);
}

add_action('wp_ajax_rating_category_back', 'rating_category');
add_action('wp_ajax_nopriv_rating_category_back', 'rating_category');

?>