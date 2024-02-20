<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$casestudy = new FieldsBuilder('casestudy_cpt');


$casestudy
->setLocation('post_type', '==', 'casestudy');


$casestudy
->addImage('logo', [
    'return_format' => 'url',
])
->addImage('image_for_insight_block', [
  'return_format' => 'url',
])
->addLink('cta', [
    'return_format' => 'array',
])
->addText('intro_title')        
->addWysiwyg('intro', [        
  'conditional_logic' => [
    [
        'field' => 'type_person',
        'operator' => '==',
        'value' => 'internal_person'
    ]
  ]
])
->addText('key_achievements_title') 
->addWysiwyg('key_achievements', [        
  'conditional_logic' => [
    [
        'field' => 'type_person',
        'operator' => '==',
        'value' => 'internal_person'
    ]
  ]
]);


return $casestudy;