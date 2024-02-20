<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$event = new FieldsBuilder('townhall_events');

$event
->setLocation('block', '==', 'acf/townhall-events')
->addText('title')
->addText('next_townhall_title')
->addText('next_townhall_title_one')
->addText('past_townhall_title')
->addText('form_title')
->addText('form_description')
->addTextarea('body')
->addText('form_submit_copy')
->addText('townhall_form_submit_link')
->addLink('target_page', [
    'post_type' => 'page',
    'post_status' => 'publish'
])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $event;