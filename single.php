<?php get_header(); ?>

<div class="container mx-auto">
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
					<div class="title">
						<h1>
							<?php the_title(); ?>		
						</h1>
					</div>
				<?php endwhile; else: ?>
					<p><?php _e('Ничего не найдено'); ?></p>
				<?php endif; ?>	
			</div>	
			<div>

			</div>	
		</div>
	</div>
</div>

<?php get_footer(); ?>