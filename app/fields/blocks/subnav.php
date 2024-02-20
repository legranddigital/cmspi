<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$subnav = new FieldsBuilder('subnav');

$subnav
->setLocation('block', '==', 'acf/subnav');

$subnav
->addTab('Content')
    ->addRepeater('subnav', [
        'layout' => 'block',
        'min' => 1
        ])
        ->addLink('target_page', [
            'return_format' => 'array'
        ])
        ->endRepeater();

return $subnav;