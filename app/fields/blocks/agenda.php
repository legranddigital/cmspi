<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$agenda = new FieldsBuilder('agenda');

$agenda
->setLocation('block', '==', 'acf/agenda');

$agenda
->addTab('Content')
    ->addText('title')
    ->addRepeater('agendas', [
        'min' => 1,
        'layout' => 'block'
        ])
        ->addText('title')
        ->addTextarea('description')
        ->addText('time')
        ->addText('length')
        ->endRepeater()
->addTab('Scroll ID')
    ->addText('scroll_id');

return $agenda;