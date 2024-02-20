<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$insight = new FieldsBuilder('insight');

$insight
->setLocation('block', '==', 'acf/insight');

$insight
->addTab('layout')
    ->addTrueFalse('is_it_grid')
    ->addSelect('insights_display', [
         'label' => 'Insights Display',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(['pick_up_insight' => 'pick up insight'], ['latest_insigths' => 'latest insigths'])
    ->addTrueFalse('load_more')
->addTab('Content')
    ->addText('title', [
        'maxlength' => 30,
    ])
    ->addRelationship('insights', [
        'post_type' => array('casestudy', 'publication', 'news', 'video', 'post'),
        'label' => 'Select insights',
        'return_format' => 'id',
        'conditional_logic' => [
            [
                'field' => 'insights_display',
                'operator' => '==',
                'value' => 'pick_up_insight'
            ]
        ]
    ])
    ->addText('number_of_insights', [
        'label' => 'Select number of insights',
        'default_value' => '4',
        'conditional_logic' => [
            [
                'field' => 'insights_display',
                'operator' => '==',
                'value' => 'latest_insigths'
            ]
        ]
    ])
    ->addText('button_label', [
        'maxlength' => 30,
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $insight;