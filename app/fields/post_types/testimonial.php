<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$testimonial = new FieldsBuilder('testimonial_cpt');


$testimonial
->setLocation('post_type', '==', 'testimonial');


$testimonial
->addText('title')
->addText('author')
->addText('author_job_title')
->addImage('author_avatar', [
    'return_format' => 'url',
])
->addLink('get_in_touch', [
    'return_format' => 'array',
  ])
  ->addLink('linkedin_link', [
    'return_format' => 'array',
  ]);

return $testimonial;