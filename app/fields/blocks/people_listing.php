<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$people = new FieldsBuilder('people_listing');

$people
->setLocation('block', '==', 'acf/people-listing');

$people
->addTab('Content')
    ->addText('title')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $people;