<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$flourish = new FieldsBuilder('flourish');

$flourish
->setLocation('block', '==', 'acf/flourish');

$flourish
->addTab('Content')
    ->addText('title')
    ->addTextarea('embed_code')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $flourish;