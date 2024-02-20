<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$bigpoints = new FieldsBuilder('bigpoints');

$bigpoints
->setLocation('block', '==', 'acf/bigpoints');

$bigpoints
->addTab('layout')
    ->addSelect('background_style', [
         'label' => 'Background Style',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(
        ['white_bg' => 'White Background'],
        ['brown_bg' => 'Brown Background']
        )
->addTab('Content')
    ->addText('title')
    ->addTextarea('description')
    ->addRepeater('bigpoints_blocks', [
        'layout' => 'block'
        ])
        ->addImage('icon', [
            'return_format' => 'url',
        ])
        ->addText('title')
        ->addTextarea('description')
        ->endRepeater()
->addTab('Scroll ID')
    ->addText('scroll_id');

return $bigpoints;