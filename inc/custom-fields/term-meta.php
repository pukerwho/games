<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', 'Options' )
    ->where( 'term_taxonomy', '=', 'category' )
    ->add_fields( array(
    	Field::make( 'image', 'crb_cats_img', 'Фото иконка' )->set_value_type( 'url'),
    	Field::make( 'rich_text', 'crb_cats_content', 'Контент' ),
    	Field::make( 'text', 'crb_cats_rating', 'Рейтинг' )->set_attribute( 'type', 'number' )->set_default_value( 5 ),
    	Field::make( 'text', 'crb_cats_rating_count', 'Счетчик рейтинга' )->set_attribute( 'type', 'number' )->set_default_value( 1 ),
    ) );
}

?>