<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', 'Options' )
    ->add_tab( 'Общие', array(
        Field::make( 'image', 'crb_header_logo', 'Логотип' )->set_value_type( 'url'),
        Field::make( 'image', 'crb_site_bg', 'Фон' )->set_value_type( 'url'),
        Field::make( 'rich_text', 'crb_main_content', 'Текст для главной страницы' ),
        Field::make( 'textarea', 'crb_copyright', 'Копирайт' ),
    ) )
    ->add_tab( 'Реклама', array(
        Field::make( 'textarea', 'crb_ad_top_horizont_banner', 'Верхний горизонтальный баннер' ),
        Field::make( 'textarea', 'crb_ad_top_banner', 'Верхний квадратный баннер' ),
        Field::make( 'textarea', 'crb_ad_bottom_horizont_banner', 'Баннер в подвале' ),
    ) )
    ->add_tab( 'Комментарии VK', array(
        Field::make( 'textarea', 'crb_comments_head', 'Код в head' ),
        Field::make( 'textarea', 'crb_comments_inner', 'Код для отображения' ),
    ) );
}

?>