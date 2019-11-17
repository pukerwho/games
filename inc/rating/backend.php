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
	  ) );
	wp_enqueue_script( 'rating' );
}

function rating_category(){
	global $wpdb;
  
  $category_id = $_POST['catId'];
  $category_rating_new = $_POST['categoryRatingNew'];
  $category_rating_old = $_POST['categoryRatingOld'];
  $category_rating_count = $_POST['categoryRatingCount'];

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
	);

	echo $category_rating_old;
}

add_action('wp_ajax_rating_category_back', 'rating_category');
add_action('wp_ajax_nopriv_rating_category_back', 'rating_category');

?>