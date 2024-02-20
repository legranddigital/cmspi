<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$people = new FieldsBuilder('people_cpt');


$people
->setLocation('post_type', '==', 'people');

$people
  ->addText('first_name')
  ->addText('last_name')
  ->addText('position')
  ->addText('linkedin_url')
  ->addSelect('type_person', [
      'default_value' => 'row',
    'layout' => 'vertical',
    'return_format' => 'value',
])
 ->addChoices(
   ['internal_person' => 'Internal Person'],
   ['external_person' => 'External Person']
   )
 
  ->addText('email', [        
  'conditional_logic' => [
    [
        'field' => 'type_person',
        'operator' => '==',
        'value' => 'internal_person'
    ]
  ]
])
  ->addText('location', [        
    'conditional_logic' => [
      [
          'field' => 'type_person',
          'operator' => '==',
          'value' => 'internal_person'
      ]
    ]
  ])
  ->addTextarea('short_description', [        
    'conditional_logic' => [
      [
          'field' => 'type_person',
          'operator' => '==',
          'value' => 'internal_person'
      ]
    ]
  ])
  ->addText('expertise_title')        
  ->addWysiwyg('expertise', [        
    'conditional_logic' => [
      [
          'field' => 'type_person',
          'operator' => '==',
          'value' => 'internal_person'
      ]
    ]
  ])
  ->addText('highlights_title') 
  ->addWysiwyg('highlights', [        
    'conditional_logic' => [
      [
          'field' => 'type_person',
          'operator' => '==',
          'value' => 'internal_person'
      ]
    ]
  ])
  ->addText('contact_title') 
  ->addText('company', [        
    'conditional_logic' => [
      [
          'field' => 'type_person',
          'operator' => '==',
          'value' => 'external_person'
      ]
    ]
  ]);

return $people;