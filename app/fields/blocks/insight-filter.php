<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$insight = new FieldsBuilder('insight_filter');

$insight
->setLocation('block', '==', 'acf/insight-filter');

$insight
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

return $insight;