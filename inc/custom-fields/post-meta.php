<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'Rating' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      Field::make( 'text', 'crb_post_rating', 'Рейтинг' )->set_attribute( 'type', 'number' )->set_default_value( 5 ),
    	Field::make( 'text', 'crb_post_rating_count', 'Счетчик рейтинга' )->set_attribute( 'type', 'number' )->set_default_value( 1 ),
  ) );
}

?>