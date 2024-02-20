<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$insight = new FieldsBuilder('insight_hero');

$insight
->setLocation('block', '==', 'acf/insight-hero');

$insight
->addTab('Content')
    ->addRelationship('insights', [
        'post_type' => array('casestudy', 'publication', 'news', 'video', 'post'),
        'label' => 'Select insights',
        'return_format' => 'id',
        'max' => 1,
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $insight;