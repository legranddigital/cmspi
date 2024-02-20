<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Client extends Controller
{
    public static function get_client_data($cpt_field)
    {
        $stack  = [];
        $client_ids = get_field($cpt_field);
        if ($client_ids) {
            $stack = array_map(function ($id) {
                return array(
                    'image'   => get_the_post_thumbnail_url($id, 'full')
                );
            }, $client_ids);
        }

        return $stack;
    }
}
