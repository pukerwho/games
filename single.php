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
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="bg-white shadow-lg rounded">
				<div class="title px-3 py-3">
					<h1>
						<?php the_title(); ?>		
					</h1>
				</div>
				<div class="content px-3 py-3">
					<div class="mb-3">
						<?php the_content(); ?>	
					</div>
					<div class="underline-green mb-2">
						<p>Здесь расположена онлайн <span class="font-bold"><?php the_title(); ?></span> поиграть в нее вы можете прямо сейчаc!</p>
					</div>
					<div>
						<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
							foreach ($current_term as $myterm); {
								$current_term_slug = $myterm->slug;
								$current_term_name = $myterm->name;
							} 
						?>
						<p>Раздел: <a href="<?php echo get_term_link($myterm->term_id, 'category') ?>"><?php echo $current_term_name; ?></a></p>
					</div>	
				</div>
				<div>
					<div id="play_game">
            <?php
            if (function_exists('get_game')) { ?>
              <div id= "bordeswf">
                <?php
                $embedcode = get_game($post->ID);
                global $mypostid; $mypostid = $post->ID;
                echo myarcade_get_leaderboard_code();
                echo $embedcode;
                ?>
              </div>
            <?php } ?>
          </div><?php // end play_game ?>
				</div>
			</div>	
			<div class="bg-white shadow-lg rounded text-center mb-3 py-3 px-3">
				Оцените, пожалуйста, данную игру:
				<div class="stars">
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
						$rating_old = carbon_get_post_meta(get_the_ID(), 'crb_post_rating'); 
						$rating_count = carbon_get_post_meta(get_the_ID(), 'crb_post_rating_count'); 
						$rating = $rating_old/$rating_count;
					?>
					<input type="hidden" value="<?php echo $rating ?>" class="get_rating">
					<div class="stars-outer">
	          <div class="stars-inner">
	          </div>
	        </div>	
				</div>
				<div class="text-sm text-gray-800 mb-3">
					<span class="mr-2">Рейтинг: <?php echo number_format($rating, 1); ?>;</span>
					<span>Голосов: <?php echo $rating_count; ?>;</span>
				</div>
				<div class="relative mb-3">
					<?php echo do_shortcode('[Sassy_Social_Share]') ?> 
				</div>
				<div class="flex items-center justify-center mb-3">
					<?php if(get_previous_post_link()): ?>
						<div class="flex items-center bg-yellow-300 uppercase rounded py-1 px-3 mr-2">
							<img src="<?php bloginfo('template_url') ?>/img/left-arrow.svg" alt="" width="25px">
							<?php echo get_previous_post_link('%link', 'Предыдущая игра'); ?>
						</div>
					<?php endif; ?>
					<?php if(get_next_post_link()): ?>
						<div class="flex items-center bg-yellow-300 uppercase rounded py-1 px-3 ml-2">
							<?php echo get_next_post_link('%link', 'Следующая игра'); ?>
							<img src="<?php bloginfo('template_url') ?>/img/right-arrow.svg" alt="" width="25px">
						</div>
					<?php endif; ?>
				</div>
				<div class="flex items-center justify-center mb-3">
					<div class="notworking_button flex items-center bg-red-300 uppercase rounded cursor-pointer py-1 px-3 ml-2">
						<img src="<?php bloginfo('template_url') ?>/img/warning.svg" alt="" width="25px" class="mr-2">
						Игра не работает?
					</div>
				</div>
				<div class="mb-3">
					<?php echo carbon_get_theme_option( 'crb_ad_bottom_horizont_banner' ); ?>	
				</div>
				
				<div>
					<?php if (carbon_get_theme_option( 'crb_comments_inner' )): ?>
				    <?php echo carbon_get_theme_option( 'crb_comments_inner' ); ?>
				  <?php endif; ?>
				</div>
			</div>
			<?php endwhile; else: ?>
				<p><?php _e('Ничего не найдено'); ?></p>
			<?php endif; ?>		
		</div>
	</div>
</div>

<?php get_footer(); ?>