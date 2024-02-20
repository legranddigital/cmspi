<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$customer = new FieldsBuilder('banner');

$customer
->setLocation('block', '==', 'acf/banner');

$customer
->addTab('Content')
    ->addRepeater('slides', [
        'min' => 1,
        'layout' => 'block'
        ])
        ->addImage('image', [
            'return_format' => 'url',
        ])
        ->addImage('mobile_image', [
            'return_format' => 'url',
            'instructions' => 'Upload an image of 1125px by 1500px',
        ])
        ->addText('title', [
        ])
        ->addText('title_large', [
        ])
        ->addTextarea('body', [
        ])
        ->addText('learn_more_button_label', [
            'maxlength' => 30,
        ])
        ->addLink('target_page', [
            'return_format' => 'array',
        ])
        ->endRepeater();

return $customer;