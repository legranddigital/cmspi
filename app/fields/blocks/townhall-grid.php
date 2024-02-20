<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$event = new FieldsBuilder('townhall_grid');

$event
->setLocation('block', '==', 'acf/townhall-grid')
->addText('title')
->addLink('target_page', [
    'post_type' => 'page',
    'post_status' => 'publish'
])
->addTab('Scroll ID')
    ->addText('scroll_id');


return $event;