<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$content_with_icon = new FieldsBuilder('content_with_icon');

$content_with_icon
->setLocation('block', '==', 'acf/content-with-icon');

$content_with_icon
->addTab('Content')
    ->addRepeater('content_with_icon_blocks', [
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
->addTab('Scroll ID')
    ->addText('scroll_id');

return $content_with_icon;