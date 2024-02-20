<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class EventResource extends Controller
{
    public static function get_event_resource_data()
    {
        $stack  = [];
        $args = array(
            'numberposts' => 3,
            'fields' => 'ids',
            'order'   => 'DESC',
            'post_type' => array('event')
        );
        $event_ids = get_posts($args);

        if ($event_ids) {
            $stack = array_map(function ($id) {
                $term_obj_list = get_the_terms($id, 'region');
                $region_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                $term_obj_list = get_the_terms($id, 'presence');
                $presence_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                return array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'title'     => get_the_title($id),
                    'page_link'     => esc_url(get_permalink($id)),
                    'region_terms'     => $region_terms,
                    'presence_terms'     => $presence_terms,
                    'date'     => get_the_date('M j, Y'),

                );
            }, $event_ids);
        }

        return $stack;
    }
}
