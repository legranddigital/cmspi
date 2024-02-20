<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$title_description = new FieldsBuilder('title-description');

$title_description
->setLocation('block', '==', 'acf/title-description');

$title_description

->addTab('Layout')
    ->addSelect('block_style', [
        'default_value' => 'grid',
        'layout' => 'vertical',
        'return_format' => 'value',
    ])
    ->addChoices(['h1' => 'H1'], ['h2' => 'H2'], ['h3' => 'H3'], ['h4' => 'H4'])
    ->addSelect('block_alignement', [
        'default_value' => 'grid',
        'layout' => 'vertical',
        'return_format' => 'value',
    ])
    ->addChoices(['left' => 'left'], ['center' => 'center'])

    ->addTab('Content')
        ->addText('tag', [
        ])

        ->addText('title', [
            'conditional_logic' => [
                [
                    'field' => 'block_style',
                    'operator' => '==',
                    'value' => 'h1'
                ]
            ]
        ])
        ->addText('sub_title', [
            'conditional_logic' => [
                [
                    'field' => 'block_style',
                    'operator' => '==',
                    'value' => 'h2'
                ]
            ]
        ])

        ->addText('sub_title_h3', [
            'conditional_logic' => [
                [
                    'field' => 'block_style',
                    'operator' => '==',
                    'value' => 'h3'
                ]
            ]
        ])
        ->addWysiwyg('body_copy', [
            'maxlength' => 400,
        ])
        ->addLink('target_page', [
            'return_format' => 'array',
        ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $title_description;