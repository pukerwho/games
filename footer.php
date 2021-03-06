    </section>
    <div class="up_scroll cursor-pointer">
    	<img src="<?php bloginfo('template_url') ?>/img/games-up.svg" alt="" width="30px">
    </div>
    <footer id="footer" class="footer">
    	<div class="container mx-auto mb-3 px-3 md:px-0">
    		<div class="breadcrumbs">
    			<?php if( is_single() ): ?>
    				<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
							foreach ($current_term as $myterm); {
								$current_term_slug = $myterm->slug;
								$current_term_name = $myterm->name;
							} 
						?>
    				<span typeof="v:Breadcrumb"> 
    					<a href="<?php echo home_url() ?>" rel="v:url" property="v:title" class="underline font-semibold text-gray-800 hover:text-gray-900">Главная</a> › 
    				</span> 
    				<?php if($current_term_slug): ?>
    					<span typeof="v:Breadcrumb"> 
    						<a href="<?php echo home_url() ?>/<?php echo $current_term_slug ?>" rel="v:url" property="v:title" class="underline font-semibold text-gray-800 hover:text-gray-900"><?php echo $current_term_name ?></a> › 
    					</span>
    				<?php endif; ?>
    				<span typeof="v:Breadcrumb" class="text-gray-800">
    					<?php the_title(); ?> 
    				</span>
    			<?php endif; ?>
                <?php if( is_category() ): ?>
                    <span typeof="v:Breadcrumb"> 
                        <a href="<?php echo home_url() ?>" rel="v:url" property="v:title" class="underline font-semibold text-gray-800 hover:text-gray-900">Главная</a> › 
                    </span> 
                    <span typeof="v:Breadcrumb" class="text-gray-800">
                        <?php single_term_title(); ?>
                    </span>
                <?php endif; ?>
    		</div>
    	</div>
    	<div class="bg-indigo-800 text-white py-2">
    		<div class="container mx-auto px-3 md:px-0">
    			<div class="flex justify-center items-center md:justify-between flex-col-reverse md:flex-row">
    				<div class="copyright">
    					<?php echo carbon_get_theme_option( 'crb_copyright' ); ?>
    				</div>
    				<div class="mb-3 md:mb-0">
    					<?php wp_nav_menu([
		            'theme_location' => 'footer_menu',
		            'container' => 'nav',
		            'menu_id' => 'footer_menu',
		            'menu_class' => 'flex menu flex-col md:flex-row'
		          ]); ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </footer>
    <?php if( is_single() ): ?>
        <div class="notworking modal rounded shadow-lg p-3">
            <div class="modal-close">X</div>
            <img src="<?php bloginfo('template_url') ?>/img/warning.svg" alt="" width="20px" class="float-left mr-1">
            <p class="text-sm mb-3">Игра не работает? Попробуйте перезагрузить страницу и немного подождать. Если игра все равно не запускается, нажмите на кнопку "Игра не работает". Спасибо.</p>
            <div>
                <?php echo do_shortcode('[contact-form-7 id="5" title="Игра не работает"]') ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal-bg"></div>
    <?php wp_footer(); ?>
  </div>
</body>
</html>