<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$event = new FieldsBuilder('upcoming_events');

$event
->setLocation('block', '==', 'acf/upcoming-events')
->addText('title')
->addTextarea('body')
->addLink('target_page', [
    'post_type' => 'page',
    'post_status' => 'publish'
])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $event;