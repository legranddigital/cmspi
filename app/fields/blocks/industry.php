<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$industry_grid = new FieldsBuilder('industry_grid');

$industry_grid
->setLocation('block', '==', 'acf/industry-grid');

$industry_grid
->addTab('Content')
    ->addRepeater('industry_grid_blocks', [
        'layout' => 'block'
        ])
        ->addImage('image', [
            'return_format' => 'url',
        ])
        ->addText('title', [
        ])
        ->addTextarea('body', [
        ])
        ->addLink('target_page', [
            'return_format' => 'array',
          ])
        ->endRepeater()
    ->addText('button_label', [
        'maxlength' => 30,
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $industry_grid;