<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$workable_job_list = new FieldsBuilder('workable_job_list');

$workable_job_list
->setLocation('block', '==', 'acf/workable-job-list');

$workable_job_list
->addTab('Content')
    ->addText('title')
->addTab('Scroll ID')
    ->addText('scroll_id');

return $workable_job_list;