<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$people = new FieldsBuilder('people');

$people
->setLocation('block', '==', 'acf/people');

$people
->addTab('Content')
    ->addText('title')
    ->addText('copy')
    ->addTrueFalse('display_in_grid')
    ->addRelationship('people_cpt', [
        'post_type' => 'people',
        'label' => 'Select people',
        'return_format' => 'id'
    ])
    ->addText('get_in_touch_button_label')
    ->addText('connect_button_label')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $people;