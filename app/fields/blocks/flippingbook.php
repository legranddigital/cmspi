<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$flippingbook = new FieldsBuilder('flippingbook');

$flippingbook
->setLocation('block', '==', 'acf/flippingbook');

$flippingbook
->addTab('Content')
    ->addTextarea('embed_code')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $flippingbook;