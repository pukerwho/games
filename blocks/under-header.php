<div class="under_header flex flex-col md:flex-row">
	<!-- Две категории -->
	<?php 
		$all_terms = get_terms([
			'taxonomy' => 'category',
			'parent' => 0,
			'number' => 2
		]);

		foreach ($all_terms as $term):
	?>
		<?php if(get_term_children($term->term_id, 'category')): ?>
			<div class="w-full md:w-2/5">
				<div class="term_list mb-3">
					<div class="term_list_title text-xl mb-1">
						<?php echo $term->name ?>			
					</div>
					<div class="flex flex-wrap">
						<?php 
							$child_terms = get_term_children($term->term_id, 'category');
							foreach ($child_terms as $child_term):
						?>
						  <?php $child = get_term_by('id', $child_term, 'category'); ?>
							<a href="<?php echo get_term_link($child->term_id, 'category') ?>">
								<div class="term_list_item relative mr-1 mb-1">
									<img src="<?php echo carbon_get_term_meta($child->term_id, 'crb_cats_img'); ?>" alt="">
									<span>
										<?php echo $child->name ?>		
									</span>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	<div class="w-full md:w-1/5">
		<?php echo carbon_get_theme_option( 'crb_ad_top_banner' ); ?>
	</div>
</div>