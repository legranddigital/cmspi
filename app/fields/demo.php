<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$intro = new FieldsBuilder('demo');


$intro

->setLocation('block', '==', 'acf/demo');


$intro

->addText('heading')

->addWysiwyg('text');


return $intro;