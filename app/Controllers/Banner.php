<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Banner extends Controller
{
    public static function get_banner_data()
    {
        $stack  = [];
        $banner = get_field('slides');
        if( $banner ) {
            $len = count($banner);
            foreach( $banner as $i=>$row ) {
                $nextIndex = 0;
                if($len > ($i+1)){
                    $nextIndex = $i + 1;
                }
                $nextRow = $banner[$nextIndex];
                array_push($stack, array(
                    'index'     => $i,
                    'image'     => $row['image'],
                    'mobile_image'     => $row['mobile_image'],
                    'title'     => $row['title'],
                    'title_large'     => $row['title_large'],
                    'body'     => $row['body'],
                    'learn_more_button_label'     => $row['learn_more_button_label'],
                    'target_page'     => $row['target_page'],
                    'nextIndex'     => $nextIndex,
                    'next_slide_image'     => $nextRow['image'],
                    'next_slide_title_large'     => $nextRow['title_large']
                ));
            }
        }
        
        return $stack;
    }
}