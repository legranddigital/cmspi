<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class People extends Controller
{
    public static function get_people_data($cpt_field)
    {
        $stack  = [];
        $people_ids = get_field($cpt_field);
        $len = count($people_ids);
        $display_in_grid = get_field('display_in_grid');
        if ($people_ids) {
            $stack = array_map(function ($id) {
                return array(
                    'profile_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'first_name'     => get_field('first_name', $id),
                    'last_name'     => get_field('last_name', $id),
                    'position'     => get_field('position', $id),
                    'linkedin_url'     => get_field('linkedin_url', $id),
                    'internal_person'     => get_field('internal_person', $id),
                    'email'     => get_field('email', $id),
                    'location'     => get_field('location', $id),
                    'short_description'     => get_field('short_description', $id),
                    'expertise'     => get_field('expertise', $id),
                    'highlights'     => get_field('highlights', $id),
                    'external_person'     => get_field('external_person', $id),
                    'company'     => get_field('company', $id),
                    'page_link'     => esc_url(get_permalink($id)),
                );
            }, $people_ids);
        }

        return [
            'data' => $stack,
            'display_in_grid' => $display_in_grid,
            'layout_style_class' => "box-" . $len,
            'layout_col' => $len > 1 ? 12 /$len : 6,
            'layout_style' => $len > 3 ? 'grid' : 'offset',
            'carousel_class' => $len > 5 ? 'people_carousel' : ''
        ];
    }
    public static function get_people_listing()
    {
        $stack  = [];
        $filterby = '';
        $q = '';
        $action = get_query_var('action');
        $postPerPage = 12;
        $max_num_pages = 0;
        $found_posts = 0;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (get_query_var('filterby') || get_query_var('filterquery')) {
            $filterby = get_query_var('filterby');
            $q = get_query_var('filterquery');
            if ((isset($filterby) && !empty($filterby))) {
                $filters = json_decode(stripslashes($filterby));
                $tax_query = ['relation' => 'OR'];
                foreach ($filters as $tax => $terms) {
                    array_push($tax_query, array(
                        'taxonomy' => $tax,
                        'field' => 'slug',
                        'terms' => $terms
                    ));
                }
            }
        }
        $args = array(
            'posts_per_page' => $postPerPage,
            'paged' => $paged,
            'post_type' => array('people')
        );
        $args['meta_query'] = array(
            'relation'      => 'AND',
            array(
                'key'       => 'type_person',
                'compare'   => '==',
                'value'     => 'internal_person',
            )
        );
        if (isset($tax_query) && !empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }
        if (isset($q) && !empty($q)) {
            $args['s'] = $q;
        }
        $the_query = new \WP_Query($args);
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                $id = get_the_ID();
                $stack[] = array(
                    'profile_image'   => get_the_post_thumbnail_url(),
                    'first_name'     => get_field('first_name', $id),
                    'last_name'     => get_field('last_name', $id),
                    'position'     => get_field('position', $id),
                    'linkedin_url'     => get_field('linkedin_url', $id),
                    'internal_person'     => get_field('internal_person', $id),
                    'email'     => get_field('email', $id),
                    'location'     => get_field('location', $id),
                    'short_description'     => get_field('short_description', $id),
                    'expertise'     => get_field('expertise', $id),
                    'highlights'     => get_field('highlights', $id),
                    'external_person'     => get_field('external_person', $id),
                    'company'     => get_field('company', $id),
                    'page_link'     => esc_url(get_permalink()),

                    
                );
            endwhile;
            $max_num_pages = $the_query->max_num_pages;
            $found_posts = $the_query->found_posts;
            wp_reset_postdata();
        endif;

        return array(
            'data' => $stack,
            'max_num_pages' => $max_num_pages,
            'found_posts' => $found_posts,
            'action' => $action
        );
    }
   
}
