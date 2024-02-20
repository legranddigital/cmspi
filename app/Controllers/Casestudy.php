<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Casestudy extends Controller
{
    public static function get_casestudy_data($cpt_field)
    {
        $stack  = [];
        $casestudy_ids = get_field($cpt_field);
        $tag_result_page = get_field('tag_result_page');
        if ($casestudy_ids) {
            $grid_index = 0;
            foreach ($casestudy_ids as $id) {
                $grid_index++;
                array_push($stack, array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'title'     => get_the_title($id),
                    'body'     => get_the_excerpt($id),
                    'logo'     => get_field('logo', $id),
                    'cta'     => get_field('cta', $id),
                    'tags'     => self::cs_show_terms($id, $tag_result_page),
                    'grid_class' => $grid_index == 1 ? 'full' : 'half',
                    'intro_title'     => get_field('intro_title', $id),
                    'intro'     => get_field('intro', $id),
                    'key_achievements_title'     => get_field('key_achievements_title', $id),
                    'key_achievements'     => get_field('key_achievements', $id)
                ));
                if ($grid_index == 3) {
                    $grid_index = 0;
                }
            }
        }

        return $stack;
    }

    public static function get_casestudy_listing()
    {
        $stack  = [];
        $filterby = '';
        $q = '';
        $action = get_query_var('action');
        $postPerPage = 7;
        $max_num_pages = 0;
        $found_posts = 0;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $tag_result_page = get_field('tag_result_page');
        
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
            'post_type' => array('casestudy')
        );
        if (isset($tax_query) && !empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        } else {
            $tax_query = ['relation' => 'OR'];
            $taxonomies = [
                'indsutry',
                'service',
                'region'
            ];
            foreach ($taxonomies as $tax) {
                $terms = get_terms(array(
                    'taxonomy' => $tax,
                    'hide_empty' => true,
                ));
                if (!empty($terms) && !is_wp_error($terms)) {
                    $term_slugs = array();
                    foreach ($terms as $term) :
                        $term_slugs[] = $term->slug;
                    endforeach;
                    array_push($tax_query, array(
                        'taxonomy' => $tax,
                        'field' => 'slug',
                        'terms' => $term_slugs
                    ));
                }
            }
            $args['tax_query'] = $tax_query;
        }
        if (isset($q) && !empty($q)) {
            $args['s'] = $q;
        }

        $the_query = new \WP_Query($args);
        if ($the_query->have_posts()) :
            $grid_index = 0;
            while ($the_query->have_posts()) : $the_query->the_post();
                $id = get_the_ID();
                $grid_index++;
                $stack[] = array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'title'     => get_the_title($id),
                    'body'     => get_the_excerpt($id),
                    'logo'     => get_field('logo', $id),
                    'cta'     => get_field('cta', $id),
                    'tags'     => self::cs_show_terms($id, $tag_result_page),
                    'grid_class' => $grid_index == 1 ? 'full' : 'half',

                );
                if ($grid_index == 3) {
                    $grid_index = 0;
                }
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

    private static function cs_show_terms($id, $tag_result_page)
    {
        $output = '';
        $taxonomies = [
            'indsutry',
            'service',
            'region'
        ];
        $tag_result_page_url = $tag_result_page ? $tag_result_page['url'] : '';
       
        foreach ($taxonomies as $taxonomy) {
            $terms = wp_get_object_terms($id, $taxonomy);
              
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $filterBy = [];
                    $filterBy[$taxonomy] = [$term->slug];
                    // echo '<pre>';
                    // print_r(json_encode($filterBy));
                    // echo '</pre>';
                    $output .= '<a class="' . $taxonomy . '" href="' . $tag_result_page_url . '?filterby=' . urlencode(json_encode($filterBy)) . '">' . __($term->name) . '</a>';
                }
            }
        }

        return trim($output);
    }

    private static function cs_show_tags($id)
    {
        $post_tags = get_the_tags($id);
        $output = '';

        if (!empty($post_tags)) {
            foreach ($post_tags as $tag) {
                $output .= '<a href="' . esc_attr(get_tag_link($tag->term_id)) . '">' . __($tag->name) . '</a>';
            }
        }

        return trim($output);
    }

    public static function get_filters()
    {
        global $wpdb;
        $stack  = [];
        $post_types = 'casestudy';

        $taxonomies = get_object_taxonomies($post_types, 'objects');
        foreach ($taxonomies as $taxonomy => $obj) :
            $sql = $wpdb->prepare(
                "SELECT t.*, tt.* FROM {$wpdb->terms} AS t
                    INNER JOIN {$wpdb->term_taxonomy} AS tt ON t.term_id = tt.term_id
                    INNER JOIN {$wpdb->term_relationships} AS tr ON tr.term_taxonomy_id = tt.term_taxonomy_id
                    INNER JOIN {$wpdb->posts} AS p ON p.ID = tr.object_id
                    WHERE p.post_type = %s AND tt.taxonomy = %s
                    GROUP BY t.term_id",
                $post_types,
                $taxonomy
            );
            $terms = $wpdb->get_results($sql);
            if (!empty($terms)) {
                $stack[$obj->name] = [
                    'label' => $obj->label,
                    'terms' => []
                ];
                foreach ($terms as $term) :
                    $stack[$obj->name]['terms'][] = [
                        'name' => $term->name,
                        'slug' => $term->slug
                    ];
                endforeach;
            }
        endforeach;
        return $stack;
    }

    public static function get_filter_result()
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
            'post_type' => array('casestudy')
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
                $categories = get_the_category();
                $cat = '';
                if (!empty($categories)) {
                    $cat = esc_html($categories[0]->name);
                }
                $post_type = get_post_type();
                $obj = get_post_type_object($post_type);
                $id = get_the_ID();
                $term_obj_list = get_the_terms($id, 'region');
                $region_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                $term_obj_list = get_the_terms($id, 'presence');
                $presence_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));

                $stack[] = array(
                    'featured_image'   => get_the_post_thumbnail_url(),
                    'title'     => get_the_title(),
                    'body'     => get_the_excerpt(),
                    'page_link'     => esc_url(get_permalink()),
                    'category'     => $cat,
                    'date'     => get_the_date('F jS Y'),
                    'region_terms'     => $region_terms,
                    'presence_terms'     => $presence_terms,
                    'post_type' => get_post_type(),
                    'post_type_name' => $obj->labels->name,
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
