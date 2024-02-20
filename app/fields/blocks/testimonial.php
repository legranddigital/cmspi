<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$testimonial = new FieldsBuilder('testimonial');

$testimonial
->setLocation('block', '==', 'acf/testimonial');

$testimonial
->addTab('Content')
    ->addRelationship('testimonial_cpt_carousel', [
        'post_type' => 'testimonial',
        'label' => 'Select testimonial',
        'return_format' => 'id',
        'conditional_logic' => [
            [
                'field' => 'layout_style',
                'operator' => '==',
                'value' => 'testimonial_carousel'
            ]
        ]
    ])
->addTab('Scroll ID')
    ->addText('scroll_id');
    

return $testimonial;