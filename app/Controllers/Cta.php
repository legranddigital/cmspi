<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Cta extends Controller
{
    public static function get_cta_data()
    {
        $stack  = [];
        $data = get_field('cta_blocks');
        $len = count($data);
        if( $data ) {
            foreach( $data as $i=>$row ) {
                array_push($stack, array(
                    'title'     => $row['title'],
                    'sub_title'     => $row['sub_title'],
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