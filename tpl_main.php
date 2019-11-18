<?php
/*
Template Name: Главная
*/
?>

<?php get_header(); ?>

<div class="container mx-auto px-3 md:px-0">
	<?php get_template_part('blocks/under-header') ?>
	<div class="flex">
		<div class="hidden md:block md:w-1/3">
			<?php get_template_part('blocks/sidebar') ?>	
		</div>
		<div class="w-full md:w-2/3">
			<div class="mb-3">
				<?php echo carbon_get_theme_option( 'crb_ad_top_horizont_banner' ); ?>
			</div>
			<div class="bg-white shadow-lg rounded">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="content py-3 px-3">
					<?php the_content(); ?>	
				</div>
				<?php endwhile; else: ?>
					<p><?php _e('Ничего не найдено'); ?></p>
				<?php endif; ?>
				<div class="all_games flex flex-wrap mb-3 px-1 md:px-2">
					<?php 
						global $wp_query, $wp_rewrite;  
						// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
						$custom_query = new WP_Query( array( 
							'post_type' => 'post', 
							'posts_per_page' => 3,
							'paged' => $current,
							'orderby' => 'date',
							'order' => 'DESC',
						));
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="w-1/3 md:w-1/5 px-1 md:px-1">
								<div class="game_item h-32 relative rounded-lg mb-3" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover;">
									<a href="<?php the_permalink(); ?>">
										<div class="game_item_bg rounded-lg"></div>
										<div class="text-center text-white absolute inset-x-0 bottom-0"><?php the_title(); ?></div>
									</a>
								</div>
							</div>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				<div>
					<div class="b_pagination">
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
		</div>	
	</div>
</div>

<?php get_footer(); ?>