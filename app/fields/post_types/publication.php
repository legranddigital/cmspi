<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$post = new FieldsBuilder('publication_cpt');


$post
->setLocation('post_type', '==', 'publication');


$post
->addRelationship('people_cpt', [
    'post_type' => 'people',
    'label' => 'Select people',
    'return_format' => 'id'
])
->addImage('image_for_insight_block', [
    'return_format' => 'url',
]);


return $post;