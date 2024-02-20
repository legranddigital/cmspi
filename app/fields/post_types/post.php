<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$post = new FieldsBuilder('post_cpt');


$post
->setLocation('post_type', '==', 'post')
->addImage('image_for_insight_block', [
    'return_format' => 'url',
]);

$post
->addRelationship('people_cpt', [
    'post_type' => 'people',
    'label' => 'Select people',
    'return_format' => 'id'
]);


return $post;