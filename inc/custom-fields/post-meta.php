<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'apartments' )
    ->add_fields( array(
      Field::make( 'text', 'crb_apartments_price', __( 'Цена: от ') )->set_attribute( 'type', 'number' ),
      Field::make( 'text', 'crb_apartments_square_price', __( 'Цена за метр квадратный ') ),
      Field::make( 'select', 'crb_apartments_region', __( 'Регион' ) )
	    ->set_options( array(
	        'Елените' => 'Елените',
	        'Святой Влас' => 'Святой Влас',
	        'Солнечный берег' => 'Солнечный берег',
	        'Несебыр' => 'Несебыр',
	        'Равда' => 'Равда',
	        'Поморие' => 'Поморие',
	        'Сарафово' => 'Сарафово',
	        'Бургас' => 'Бургас',
	        'Созополь' => 'Созополь',
	        'Варна' => 'Варна',
	        'Золотые пески' => 'Золотые пески',
	        'Константин' => 'Константин',
	        'Елена' => 'Елена',
	        'София' => 'София',
	    ) ),
	    Field::make( 'select', 'crb_apartments_category', __( 'Категория ') )->set_options( array(
	        'От застройщика' => 'От застройщика',
	        'Вторичный рынок' => 'Вторичный рынок',
	      )),
	    Field::make( 'select', 'crb_apartments_type', __( 'Тип ') )->set_options( array(
	        'Студио' => 'Студио',
	        '1 комната' => '1 комната',
	        '2 комнаты' => '2 комнаты',
	        '3 комнаты' => '3 комнаты',
	        '4 комнаты' => '4 комнаты',
	        'Дом' => 'Дом',
	        'Таунхаус' => 'Таунхаус',
	        'Отель' => 'Отель',
	      )),
	    Field::make( 'text', 'crb_apartments_square', __( 'Площадь (От __ м2)') )->set_attribute( 'type', 'number' ),
	    Field::make( 'text', 'crb_apartments_floor', __( 'Этаж ') ),
	    Field::make( 'text', 'crb_apartments_view', __( 'Вид из окон ') ),
	    Field::make( 'textarea', 'crb_apartments_map', __( 'Код для Google Maps ') ),
	    Field::make( 'complex', 'crb_apartments_services', __( 'Услуги и Сервисы' ) )
		    	->add_fields( array(
		        Field::make( 'text', 'crb_apartments_services_text' ),
		    ) ),
		  Field::make( 'media_gallery', 'crb_apartments_photos', __( 'Галерея' ) )->set_type( array( 'image' ) )
  ) );
}

?>