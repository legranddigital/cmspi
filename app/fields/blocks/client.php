<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$client = new FieldsBuilder('client');

$client
->setLocation('block', '==', 'acf/client');

$client
->addText('title', [
    'maxlength' => 40,
])
->addTab('Content')
    ->addRelationship('client_cpt', [
        'post_type' => 'client',
        'label' => 'Select client',
        'return_format' => 'id'
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $client;