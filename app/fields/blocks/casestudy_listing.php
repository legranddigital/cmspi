<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$casestudy = new FieldsBuilder('casestudy_listing');

$casestudy
->setLocation('block', '==', 'acf/casestudy-listing');

$casestudy
->addTab('Content')
    ->addText('title')
    ->addLink('tag_result_page', [
        'post_type' => 'page',
        'post_status' => 'publish'
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');
 
return $casestudy;