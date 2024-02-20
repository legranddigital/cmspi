<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$casestudy = new FieldsBuilder('casestudy');

$casestudy
->setLocation('block', '==', 'acf/casestudy');

$casestudy
->addTab('layout')
    ->addSelect('layout_style', [
         'label' => 'Layout Style',
         'default_value' => 'row',
         'layout' => 'vertical',
         'return_format' => 'value',
     ])
      ->addChoices(
        ['carousel' => 'carousel'],
        ['three_in_row' => '3 in row'],
        ['single' => 'Single'],
        ['slider' => 'Slider'],
        ['grid' => 'Grid'],
        )
    ->addLink('tag_result_page', [
        'post_type' => 'page',
        'post_status' => 'publish'
    ])
->addTab('Content')
    ->addText('title', [
    'maxlength' => 30,
    ])
    ->addTextarea('description')
    ->addLink('target_page', [
        'post_type' => 'page',
        'post_status' => 'publish'
    ])
    ->addRelationship('casestudy_cpt', [
        'post_type' => 'casestudy',
        'label' => 'Select casestudy',
        'return_format' => 'id',
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $casestudy;