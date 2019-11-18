<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <base href="/">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo home_url(); ?>/en">
  <link rel="alternate" hreflang="ru" href="<?php echo home_url(); ?>/ru">
  <link rel="alternate" hreflang="ua" href="<?php echo home_url(); ?>/ua">
  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
</head>
<body <?php echo body_class(); ?> style="background: url('<?php echo carbon_get_theme_option( 'crb_site_bg' ); ?>') fixed;">
  <!-- <div class="preloader"></div> -->
  <div class="bg">
    <header id="header" class="header" role="banner">
      <div class="header_top bg-indigo-800 py-2">
        <div class="container flex justify-between items-center mx-auto px-3 md:px-0">
          <a href="<?php echo home_url() ?>">
            <div class="logo">
              <img src="<?php echo carbon_get_theme_option( 'crb_header_logo' ); ?>" alt="">
            </div>
          </a>
          <div class="search hidden md:block">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
          </div>
          <div class="mobile_menu block md:hidden">
            <span class="mobile_menu_span"></span>
            <span class="mobile_menu_span"></span>
            <span class="mobile_menu_span"></span>
          </div>
        </div>
      </div>
      <div class="mobile_cover block md:hidden bg-indigo-800">
        <?php get_template_part('blocks/mobile-cover'); ?>
      </div>
      <div class="header_bottom mb-3">
        <div class="container mx-auto">
          <?php wp_nav_menu([
            'theme_location' => 'head_menu',
            'container' => 'nav',
            'menu_id' => 'head_menu',
          ]); ?>
        </div>
      </div>
      <div class="header_tags mb-5 px-3 md:px-0">
        <div class="container mx-auto flex justify-between bg-white shadow-lg rounded-lg overflow-hidden pt-3 px-3">
          <div class="text-sm">
            <div class="float-left mr-2">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" class="float-left mr-1">
                <path id="magnifier-2-icon" d="M460.355,421.59L353.844,315.078c20.041-27.553,31.885-61.437,31.885-98.037
                    C385.729,124.934,310.793,50,218.686,50C126.58,50,51.645,124.934,51.645,217.041c0,92.106,74.936,167.041,167.041,167.041
                    c34.912,0,67.352-10.773,94.184-29.158L419.945,462L460.355,421.59z M100.631,217.041c0-65.096,52.959-118.056,118.055-118.056
                    c65.098,0,118.057,52.959,118.057,118.056c0,65.096-52.959,118.056-118.057,118.056C153.59,335.097,100.631,282.137,100.631,217.041
                    z"></path>
            </svg>
              Чаще всего ищут:
            </div>
            <div class="mr-2">
              <?php 
                $tags = get_tags(array(
                  'orderby' => 'count',
                  'order' => 'DESC',
                ));
                foreach ($tags as $tag): 
              ?>
                <li>
                  <a href="<?php echo get_tag_link($tag->term_id); ?>" class="rounded-lg border-2 border-gray-600 hover:border-gray-800 text-gray-600 hover:text-gray-800 p-1"><?php echo $tag->name; ?></a>
                </li>
              <?php endforeach; ?>    
            </div>
          </div>
          <div class="header_tags_more_btn cursor-pointer">
            <img src="<?php bloginfo('template_url'); ?>/img/down-arrow.svg" alt="" width="30px">
          </div>
        </div>
      </div>
    </header>
    <section id="content" role="main">