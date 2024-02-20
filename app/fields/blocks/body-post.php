<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$body_post = new FieldsBuilder('body_post');

$body_post
->setLocation('block', '==', 'acf/body-post');

$body_post
->addTab('layout')
    ->addSelect('layout_style', [
         'label' => 'Layout Style',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(['without_image' => 'Without Image'], ['with_image' => 'With Image'])
    ->addSelect('with_image_layout_style', [
         'label' => 'With Image Layout Style',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
         'conditional_logic' => [
            [
                'field' => 'layout_style',
                'operator' => '==',
                'value' => 'with_image'
            ]
        ]
     ])
      ->addChoices(
        ['left_image' => 'Left Image'], 
        ['right_image' => 'Right Image'], 
        )
->addTab('Content')
    ->addRepeater('body_post_blocks', [
        'layout' => 'block',
        'min' => 1       
        ])
        ->addImage('image', [
            'return_format' => 'url',
            'conditional_logic' => [
                [
                    'field' => 'layout_style',
                    'operator' => '==',
                    'value' => 'with_image'
                ]
            ]
        ])
        ->addText('large_title')
        ->addText('medium_title')
        ->addText('small_title')
        ->addText('title')
        ->addWysiwyg('body')
        ->addLink('target_page', [
            'return_format' => 'array',
        ])
        ->endRepeater()
->addTab('Scroll ID')
    ->addText('scroll_id');

return $body_post;