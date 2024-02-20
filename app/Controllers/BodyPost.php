<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class BodyPost extends Controller
{
    public static function get_body_post_data()
    {
        $stack  = [];
        $data = get_field('body_post_blocks');
        $layout_style = get_field('layout_style');
        $data = array_slice($data, 0, 3);
        $len = count($data);
        if( $data ) {
            foreach( $data as $i=>$row ) {
                array_push($stack, array(
                    'image'     => $row['image'],
                    'large_title'     => $row['large_title'],
                    'medium_title'     => $row['medium_title'],
                    'small_title'     => $row['small_title'],
                    'title'     => $row['title'],
                    'body'     => $row['body'],
                    'target_page'     => $row['target_page']

                ));
            }
        }
        
        return [
            'data' => $stack,
            'layout_style_class' => "box-" . $len,
            'layout_col' => $len > 1 ? 'col-lg-' . (12 / $len) : ($layout_style == 'without_image' ? 'col-lg-8' : 'col-lg-6')
        ];
    }
}