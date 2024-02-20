<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$post = new FieldsBuilder('video_cpt');


$post
->setLocation('post_type', '==', 'video');


$post
->addTrueFalse('autoplay')
->addImage('poster_image', [
    'return_format' => 'url',
    'conditional_logic' => [
        [
            'field' => 'autoplay',
            'operator' => '==',
            'value' => false
        ]
    ]
])
->addText('video_url')
->addImage('image_for_insight_block', [
    'return_format' => 'url',
])
->addRelationship('people_cpt', [
    'post_type' => 'people',
    'label' => 'Select people',
    'return_format' => 'id'
]);


return $post;