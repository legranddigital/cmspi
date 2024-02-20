<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$client = new FieldsBuilder('resources');

$client
    ->setLocation('block', '==', 'acf/resources');

$client
    ->addTextarea('body', [])
    ->addText('copy', [])
    ->addRepeater('target_links', [
        'layout' => 'block'
    ])
        ->addLink('target_link', [
            'return_format' => 'array',
        ])
        ->endRepeater()
    ->addText('button_label')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $client;
