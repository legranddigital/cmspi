<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$video = new FieldsBuilder('video');

$video
->setLocation('block', '==', 'acf/video');

$video
->addTab('layout')
    ->addSelect('layout_style', [
         'label' => 'Layout Style',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(
        ['2cols' => '2 columns'],
        ['full_width' => 'Full Width'],
        ['full_width_no_margin' => 'Full Width No Margin']
        )
->addTab('Content')
    ->addText('title')
    ->addTextarea('description')
    ->addTrueFalse('autoplay')
    ->addImage('poster_image', [
        'return_format' => 'url',
        'conditional_logic' => [
            [
                'field' => 'autoplay',
                'operator' => '==',
                'value' => false
            ]
        ]
    ])
    ->addText('video_url')
    ->addLink('target_page', [
        'return_format' => 'array',
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $video;