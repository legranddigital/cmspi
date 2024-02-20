<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$header_menu = new FieldsBuilder('header_menu');


$header_menu
    ->setLocation('nav_menu_item', '==', 'location/header');


$header_menu
    ->addTrueFalse('is_bold')
    ->addTrueFalse('hide_on_desktop')
    ->addTrueFalse('hide_on_mobile')
    ->addText('title')
    ->addWysiwyg('excerpt');


return $header_menu;