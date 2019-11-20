<?php get_header(); ?>

<div class="container mx-auto px-3 md:px-0">
	<?php get_template_part('blocks/under-header') ?>
	<div class="flex">
		<div class="hidden md:block md:w-1/3">
			<?php get_template_part('blocks/sidebar') ?>	
		</div>
		<div class="w-full md:w-2/3 py-3 md:py-0 md:px-0">
			<div class="mb-3">
				<?php echo carbon_get_theme_option( 'crb_ad_top_horizont_banner' ); ?>
			</div>
			<div class="bg-white shadow-lg rounded">
				<div class="content py-3 px-3">
					<h1>
						<?php single_term_title(); ?>
					</h1>
					<?php if (carbon_get_term_meta(get_queried_object_id(), 'crb_cats_content')): ?>
						<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_cats_content' ) ); ?>
					<?php endif; ?>
				</div>
				<div class="all_games flex flex-wrap mb-3 pl-3 pr-0">
					<?php $current_term = get_queried_object_id(); ?>
					<?php 
						global $wp_query, $wp_rewrite;  
						// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
						$custom_query = new WP_Query( array( 
							'post_type' => 'post', 
							'posts_per_page' => 15,
							'paged' => $current,
							'orderby' => 'date',
							'order' => 'DESC',
							'tax_query' => array(
						    array(
					        'taxonomy' => 'category',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						));
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="w-1/3 md:w-1/5 px-1 md:px-1">
								<div class="game_item h-32 relative rounded-lg mb-3" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover;">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<div class="game_item_bg rounded-lg"></div>
										<h2 class="text-base font-normal text-center text-white absolute inset-x-0 bottom-0"><?php the_title(); ?></h2>
									</a>
								</div>
							</div>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				<div>
					<div class="b_pagination mx-auto text-center pb-3">
						<?php 
							$big = 999999999; // уникальное число
							echo paginate_links( array(
							'format'  => 'page/%#%',
							'current'   => $current,
							'total'   => $custom_query->max_num_pages,
							'prev_next' => true,
							'next_text' => (''),
							'prev_text' => ('')
							)); 
						?>
					</div>
				</div>
			</div>
			<div class="bg-white shadow-lg rounded text-center mb-3 py-3 px-3">
				Оцените, пожалуйста, данную рубрику:
				<div class="stars stars-cat">
					<div class="absolute">
						<i class="fa fa-star" aria-hidden="true" data-value="1"></i>
						<i class="fa fa-star" aria-hidden="true" data-value="2"></i>
						<i class="fa fa-star" aria-hidden="true" data-value="3"></i>
						<i class="fa fa-star" aria-hidden="true" data-value="4"></i>
						<i class="fa fa-star" aria-hidden="true" data-value="5"></i>	
					</div>
				</div>
				<div style="margin-top: -30px;">
					<?php 
						$rating_old = carbon_get_term_meta(get_queried_object_id(), 'crb_cats_rating'); 
						$rating_count = carbon_get_term_meta(get_queried_object_id(), 'crb_cats_rating_count'); 
						$rating = $rating_old/$rating_count;
					?>
					<input type="hidden" value="<?php echo $rating ?>" class="get_rating">
					<div class="stars-outer">
	          <div class="stars-inner">
	          </div>
	        </div>	
				</div>
				<div class="text-sm text-gray-800">
					<span class="mr-2">Рейтинг: <?php echo number_format($rating, 1); ?>;</span>
					<span>Голосов: <?php echo $rating_count; ?>;</span>
					<br>
					<span class="rating-text">Ваша оценка принята!</span>
				</div>
			</div>
			<div class="bg-white shadow-lg rounded mb-3 py-3 px-3">
				<?php echo carbon_get_theme_option( 'crb_ad_bottom_horizont_banner' ); ?>
			</div>
			<div class="bg-white shadow-lg rounded mb-3 py-3 px-3">
				<?php if (carbon_get_theme_option( 'crb_comments_inner' )): ?>
			    <?php echo carbon_get_theme_option( 'crb_comments_inner' ); ?>
			  <?php endif; ?>
			</div>
		</div>
	</div>
</div>
<input type="hidden" value="<?php echo get_queried_object_id(); ?>" class="cat_id">
<input type="hidden" value="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_cats_rating'); ?>" class="cat_rating_old">
<input type="hidden" value="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_cats_rating_count'); ?>" class="cat_rating_count">

<?php get_footer(); ?>