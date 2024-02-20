<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$event_resource = new FieldsBuilder('event_resource');

$event_resource
->setLocation('block', '==', 'acf/event-resource');

$event_resource
->addTab('Content')
    ->addText('title')
    ->addLink('target_page', [
        'post_type' => 'page',
        'post_status' => 'publish'
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $event_resource;