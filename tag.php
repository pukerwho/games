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
				<?php if ( have_posts() ) : ?>
					<div class="content py-3 px-3">
						<h1>
							<?php single_tag_title(); ?>
						</h1>
						<?php 
							$term_description = term_description();
	          	if ( ! empty( $term_description ) ) :
	              printf( '<div class="taxonomy-description">%s</div>', $term_description );
	          	endif; 
	          ?>
					</div>
					<div class="all_games flex mb-3 pl-3 pr-0">
					<?php	while ( have_posts() ) : the_post(); ?>
						<div class="w-1/3 md:w-1/5 px-1 md:px-1">
							<div class="game_item h-32 relative rounded-lg mb-3" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover;">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<div class="game_item_bg rounded-lg"></div>
									<h2 class="text-base font-normal text-center text-white absolute inset-x-0 bottom-0"><?php the_title(); ?></h2>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
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
				<?php endif; ?>
			</div>
			<div class="bg-white shadow-lg rounded mb-3 py-3 px-3">
				Баннер
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>