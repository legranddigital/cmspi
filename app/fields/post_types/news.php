<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$news = new FieldsBuilder('news_cpt');


$news
->setLocation('post_type', '==', 'news');


$news
->addImage('image_for_insight_block', [
    'return_format' => 'url',
]);


return $news;