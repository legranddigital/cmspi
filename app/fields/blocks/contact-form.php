<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$contactForm = new FieldsBuilder('contact-form');

$contactForm
->setLocation('block', '==', 'acf/contact-form');

$contactForm
->addTab('Content')
    ->addText('cta_copy')
    ->addText('name_field_placeholder')
    ->addText('email_field_placeholder')
    ->addText('company_field_placeholder')
    ->addText('phone_field_placeholder')
    ->addText('choose_subject_placeholder')
    ->addText('message_placeholder')
    ->addRepeater('subjects', [
        'layout' => 'block',
        'min' => 1
        ])
        ->addText('subject')
        ->endRepeater()
    ->addText('contactform_submit_link')
    ->addImage('image', [
        'return_format' => 'url',
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');

return $contactForm;