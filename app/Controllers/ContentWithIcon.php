<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ContentWithIcon extends Controller
{
    public static function get_content_with_icon_data()
    {
        $stack  = [];
        $data = get_field('content_with_icon_blocks');
        $data = array_slice($data, 0, 4);
        $len = count($data);
        if( $data ) {
            foreach( $data as $i=>$row ) {
                array_push($stack, array(
                    'image'     => $row['image'],
                    'title'     => $row['title'],
                    'body'     => $row['body'],
                    'target_page'     => $row['target_page'],
                ));
            }
        }
        
        return [
            'data' => $stack,
            'layout_style' => "box-" . $len
        ];
    }
}