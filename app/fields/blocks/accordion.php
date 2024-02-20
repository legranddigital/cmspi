<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$accordion = new FieldsBuilder('accordion');

$accordion
->setLocation('block', '==', 'acf/accordion');

$accordion
->addTab('Content')
    ->addText('left_title')
    ->addTextarea('left_copy')
    ->addRepeater('accordions', [
        'min' => 1,
        'layout' => 'block'
        ])
        ->addText('title')
        ->addWysiwyg('description')
        ->addText('telephone')
        ->addText('email')
        ->addText('address')
        ->addText('google_map_url')
        ->endRepeater()
->addTrueFalse('only_Accordion')
->addTab('Scroll ID')
    ->addText('scroll_id');



return $accordion;