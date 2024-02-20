<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Insight extends Controller
{
    public static function get_insight_data($layout_style, $cpt_field, $number_of_insights)
    {
        self::maybe_switch_to_blog();

        $stack  = [];
        $insight_ids  = [];
        $insights_display = get_field($layout_style);
        if (($insights_display === "pick_up_insight") || ($layout_style === 'hero')) {
            $insight_ids = get_field($cpt_field);
        } else {
            $number_of_insights = get_field($number_of_insights);
            $args = array(
                'numberposts' => $number_of_insights,
                'fields' => 'ids',
                'order'   => 'DESC',
                'post_type' => array('publication', 'video', 'post')
            );

            $insight_ids = get_posts($args);
        }

        if ($insight_ids) {
            $stack = array_map(function ($id) {
                $categories = get_the_category($id);
                $cat = '';
                if (!empty($categories)) {
                    $cat = esc_html($categories[0]->name);
                }
                $post_type = get_post_type($id);
                $obj = get_post_type_object($post_type);
                $image_for_insight_block = get_field('image_for_insight_block', $id);
                return array(
                    'featured_image'   => $image_for_insight_block ? $image_for_insight_block : get_the_post_thumbnail_url($id, 'full'),
                    'title'     => get_the_title($id),
                    'body'     => get_the_excerpt($id),
                    'page_link'     => esc_url(get_permalink($id)),
                    'category'     => $cat,
                    'date'     => get_the_date('F jS Y', $id),
                    'post_type' => get_post_type($id),
                    'post_type_name' => $obj->labels->name,

                );
            }, $insight_ids);
        }

        self::maybe_restore_blog();

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
        $post_types = array('publication', 'video', 'post', 'news');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (get_query_var('filterby') || get_query_var('filterquery')) {
            $filterby = get_query_var('filterby');
            $q = get_query_var('filterquery');
            if ((isset($filterby) && !empty($filterby))) {
                $filters = json_decode(stripslashes($filterby));
                $tax_query = ['relation' => 'OR'];
                foreach ($filters as $tax => $terms) {
                    if ($tax === 'cpt') {
                        $post_types = $terms;
                    } else {
                        array_push($tax_query, array(
                            'taxonomy' => $tax,
                            'field' => 'slug',
                            'terms' => $terms
                        ));
                    }
                }
            }
        }

        $args = array(
            'posts_per_page' => $postPerPage,
            'paged' => $paged,
            'post_type' => $post_types
        );
        if (isset($tax_query) && !empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }
        if (isset($q) && !empty($q)) {
            $args['s'] = $q;
        }

        self::maybe_switch_to_blog();

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

                $stack[] = array(
                    'title'     => get_the_title(),
                    'body'     => get_the_excerpt(),
                    'page_link'     => esc_url(get_permalink()),
                    'category'     => $cat,
                    'date'     => get_the_date('F jS Y'),
                    'post_type' => get_post_type(),
                    'post_type_name' => $obj->labels->name,
                );
            endwhile;
            $max_num_pages = $the_query->max_num_pages;
            $found_posts = $the_query->found_posts;
            wp_reset_postdata();
        endif;

        self::maybe_restore_blog();

        return array(
            'data' => $stack,
            'max_num_pages' => $max_num_pages,
            'found_posts' => $found_posts,
            'action' => $action
        );
    }

    public static function maybe_switch_to_blog()
    {
        if (get_field('global_insights', 'option')) {
            switch_to_blog(1);
        }
    }

    public static function maybe_restore_blog()
    {
        if (get_field('global_insights', 'option')) {
            restore_current_blog();
        }
    }
}
