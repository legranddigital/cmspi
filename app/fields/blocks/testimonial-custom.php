<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$testimonial = new FieldsBuilder('testimonial_custom');

$testimonial
->setLocation('block', '==', 'acf/testimonial-custom');

$testimonial
->addText('author_full_name')
->addText('author_job_title')
->addText('company')
->addTextarea('content')
->addImage('author_avatar', [
    'return_format' => 'url',
])
->addTab('Scroll ID')
    ->addText('scroll_id');


return $testimonial;