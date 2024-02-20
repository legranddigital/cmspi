<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$cta = new FieldsBuilder('cta');

$cta
->setLocation('block', '==', 'acf/cta');

$cta
->addTab('Content')
    ->addRepeater('cta_blocks', [
        'layout' => 'block',
        'max' => 2,
        ])
        ->addText('title')
        ->addText('sub_title')
        ->addWysiwyg('body')
        ->addLink('target_page', [
            'return_format' => 'array',
          ])
        ->endRepeater()
->addTab('Layout')
->addSelect('block_style', [
    'default_value' => 'grid',
    'layout' => 'vertical',
    'return_format' => 'value',
])
 ->addChoices(['center-align' => 'Center align'], ['left-align' => 'Left align'])
 ->addTab('Scroll ID')
    ->addText('scroll_id');



return $cta;