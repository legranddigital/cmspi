<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$casestudy = new FieldsBuilder('casestudy_filter');

$casestudy
->setLocation('block', '==', 'acf/casestudy-filter');

$casestudy
->addTab('Content')
    ->addText('sub_heading')
    ->addText('title')
    ->addText('description')
    ->addLink('result_page', [
        'post_type' => 'page',
        'post_status' => 'publish'
    ])
    ->addText('btn_label')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $casestudy;