<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$event = new FieldsBuilder('event_filter');

$event
->setLocation('block', '==', 'acf/event-filter');

$event
->addTab('layout')
    ->addSelect('filter_event_type', [
         'label' => 'Event Type',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(
        ['all_events' => 'All Events'],
        ['upcoming_event' => 'Upcoming Event'],
        ['townhall_event' => 'Townhall Event(attending)'],
        ['all_townhall_event' => 'All Townhall Event'],
        ['attending_event' => 'Attending Event']
        )
->addTab('Content')
    ->addText('sub_heading')
    ->addText('title')
    ->addText('description')
    ->addLink('result_page', [
        'post_type' => 'page',
        'post_status' => 'publish'
    ])
    ->addText('btn_label')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $event;