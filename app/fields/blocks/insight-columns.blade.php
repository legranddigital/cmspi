<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$insight = new FieldsBuilder('insight_columns');

$insight
->setLocation('block', '==', 'acf/insight-columns');

$insight
->addTab('layout')
    ->addSelect('insights_display', [
         'label' => 'Insights Display',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(['pick_up_insight' => 'pick up insight'], ['latest_insigths' => 'latest insigths'])
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
    ->addSelect('number_of_insights', [
        'label' => 'select number of insights',
        'default_value' => 'row',
        'layout' => 'vertical',
        'return_format' => 'value',
        'conditional_logic' => [
            [
                'field' => 'insights_display',
                'operator' => '==',
                'value' => 'latest_insigths'
            ]
        ]
    ])
     ->addChoices(['4' => '4'], ['5' => '5'])
    ->addText('button_label', [
            'maxlength' => 30,
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $insight;