<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$event = new FieldsBuilder('event_cpt');


$event
->setLocation('post_type', '==', 'event');


$event
->addSelect('event_type', [
    'label' => 'Select Type of event',
    'return_format' => 'array'
  ])
    ->addChoices(['online' => 'Online'], ['in_person' => 'In Person'], ['both' => 'Online & In Person'])
->addSelect('event_type_town', [
      'label' => 'Select Type of event',
      'return_format' => 'array'
    ])
    ->addChoices(['event_attending' => 'Event attending'], ['event_hosting' => 'Event hosting'])
->addDatePicker('event_date')
->addTrueFalse('is_townhall')
->addText('time')
->addText('location')
->addFile('event_video', [
  'return_format' => 'array',
])
->addLink('target_page', [
  'post_type' => 'page',
  'post_status' => 'publish'
])
->addText('people_text')
->addRelationship('people_cpt', [
  'post_type' => 'people',
  'label' => 'Select people',
  'return_format' => 'id'
]);


return $event;