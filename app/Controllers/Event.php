<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Event extends Controller
{
    public static function get_upcomingEvents_data()
    {
        $stack  = [];
        $args = array(
            'fields' => 'ids',
            'posts_per_page'    => -1,
            'meta_key'          => 'event_date',
            'order'   => 'asc',
            'orderby'           => 'meta_value_num',
            'post_type' => array('event'),
            'meta_query'    => array(
                'relation'      => 'AND',
                array(
                    'key'       => 'event_date',
                    'compare'   => '>=',
                    'value'     => date('Ymd'),
                ),
                array(
                    'key'       => 'event_type_town',
                    'compare'   => '==',
                    'value'     => 'event_hosting',
                ),
                array(
                    'key'       => 'is_townhall',
                    'compare'   => '==',
                    'value'     => '0',
                )
            ),
        );
        self::maybe_switch_to_blog();
        $ids = get_posts($args);
        self::maybe_restore_blog();
        if ($ids) {
            $grid_index = 0;
            foreach ($ids as $id) {
                $grid_index++;
                $term_obj_list = get_the_terms($id, 'region');
                $region_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                array_push($stack, array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'name'     => get_the_title($id),
                    'short_description'     => get_the_excerpt($id),
                    'logo'     => get_field('logo', $id),
                    'date'     => self::get_formated_date(get_field('event_date', $id)),
                    'cta'     => get_field('cta', $id),
                    'event_type'     => get_field('event_type', $id),
                    'page_link'     => esc_url(get_permalink($id)),
                    'tags'     => self::get_featured_tags($id),
                    'region_terms'     => $region_terms,
                    'grid_class' => $grid_index == 1 ? 'full' : 'half'
                ));
            }
        }

        return $stack;
    }
    private static function get_featured_tags($id)
    {
        $term_obj_list = get_the_terms($id, 'hierarchical_tag');
        $output = '';
        if (!empty($term_obj_list)) {
            foreach ($term_obj_list as $tag) {
                $output .= '<a class="' . $tag->slug . '" href="' . esc_attr(get_tag_link($tag->term_id)) . '">' . __($tag->name) . '</a>';
            }
        }

        return trim($output);
    }
    private static function get_formated_date($event_date)
    {
        if ($event_date) {
            $date = \DateTime::createFromFormat('d/m/Y', $event_date);
            return $date->format('F jS Y');
        } else {
            return $event_date;
        }
    }
    public static function getNextTownhallEvents()
    {
        $stack  = [];
        $args = array(
            'numberposts' => 3,
            'fields' => 'ids',
            'meta_key'          => 'event_date',
            'order'   => 'asc',
            'orderby'           => 'meta_value_num',
            'post_type' => array('event'),
            'meta_query'    => array(
                'relation'      => 'AND',
                array(
                    'key'       => 'event_date',
                    'compare'   => '>=',
                    'value'     => date('Ymd'),
                ),
                array(
                    'key'       => 'event_type_town',
                    'compare'   => '==',
                    'value'     => 'event_hosting',
                ),
                array(
                    'key'       => 'is_townhall',
                    'compare'   => '==',
                    'value'     => '1',
                )
            ),
        );
        self::maybe_switch_to_blog();
        $ids = get_posts($args);
        self::maybe_restore_blog();
        if ($ids) {
            foreach ($ids as $index => $id) {
                $term_obj_list = get_the_terms($id, 'region');
                $region_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                array_push($stack, array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'name'     => get_the_title($id),
                    'short_description'     => get_the_excerpt($id),
                    'logo'     => get_field('logo', $id),
                    'date'     => self::get_formated_date(get_field('event_date', $id)),
                    'cta'     => get_field('cta', $id),
                    'event_type'     => get_field('event_type', $id),
                    'page_link'     => esc_url(get_permalink($id)),
                    'target_page'     => get_field('target_page', $id),
                    'tags'     => self::get_featured_tags($id),
                    'region_terms'     => $region_terms,
                    'grid_class' => $index == 0 ? 'first' : 'rest'
                ));
            }
        }

        return $stack;
    }
    public static function getPastTownhallEvents()
    {
        $stack  = [];
        $args = array(
            'posts_per_page'    => 3,
            'fields' => 'ids',
            'meta_key'          => 'event_date',
            'order'   => 'desc',
            'orderby'           => 'meta_value_num',
            'post_type' => array('event'),
            'meta_query'    => array(
                'relation'      => 'AND',
                array(
                    'key'       => 'event_date',
                    'compare'   => '<',
                    'value'     => date('Ymd'),
                ),
                array(
                    'key'       => 'event_type_town',
                    'compare'   => '==',
                    'value'     => 'event_hosting',
                ),
                array(
                    'key'       => 'is_townhall',
                    'compare'   => '==',
                    'value'     => '1',
                )
            ),
        );
        self::maybe_switch_to_blog();
        $ids = get_posts($args);
        self::maybe_restore_blog();
        if ($ids) {
            foreach ($ids as $index => $id) {
                $term_obj_list = get_the_terms($id, 'region');
                $region_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                array_push($stack, array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'name'     => get_the_title($id),
                    'short_description'     => get_the_excerpt($id),
                    'logo'     => get_field('logo', $id),
                    'date'     => self::get_formated_date(get_field('event_date', $id)),
                    'cta'     => get_field('cta', $id),
                    'event_type'     => get_field('event_type', $id),
                    'page_link'     => esc_url(get_permalink($id)),
                    'tags'     => self::get_featured_tags($id),
                    'region_terms'     => $region_terms,
                    'target_page'     => get_field('target_page', $id)
                ));
            }
        }

        return $stack;
    }

    public static function get_townhall_grid_data()
    {
        $stack  = [];
        $args = array(
            'numberposts' => 6,
            'fields' => 'ids',
            'order'   => 'ASC',
            'orderby'           => 'meta_value_num',
            'post_type' => array('event'),
            'meta_query'    => array(
                'relation'      => 'AND',
                array(
                    'key'       => 'event_date',
                    'compare'   => '>=',
                    'value'     => date('Ymd'),
                ),
                array(
                    'key'       => 'is_townhall',
                    'compare'   => '==',
                    'value'     => '0',
                ),
                array(
                    'key'       => 'event_type_town',
                    'compare'   => '==',
                    'value'     => 'event_attending',
                )
            ),
        );
        self::maybe_switch_to_blog();
        $ids = get_posts($args);
        self::maybe_restore_blog();

        if ($ids) {
            $stack = array_map(function ($id) {
                $term_obj_list = get_the_terms($id, 'region');
                $region_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                $term_obj_list = get_the_terms($id, 'presence');
                $presence_terms = join(', ', wp_list_pluck($term_obj_list, 'name'));
                return array(
                    'featured_image'   => get_the_post_thumbnail_url($id, 'full'),
                    'title'     => get_the_title($id),
                    'page_link'     => esc_url(get_permalink($id)),
                    'event_type'     => get_field('event_type', $id),
                    'region_terms'     => $region_terms,
                    'presence_terms'     => $presence_terms,
                    'date'     => self::get_formated_date(get_field('event_date', $id)),
                );
            }, $ids);
        }

        return $stack;
    }

    public static function get_event_filter_result()
    {
        $stack  = [];
        $filterby = '';
        $q = '';
        $action = get_query_var('action');
        $event_type = get_query_var('event_type');
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
            'post_type' => array('event'),
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        if (isset($tax_query) && !empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }
        if (isset($q) && !empty($q)) {
            $args['s'] = $q;
        }
        if (isset($event_type) && !empty($event_type)) {
            if ($event_type == 'upcoming_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'event_date',
                        'compare'   => '>=',
                        'value'     => date('Ymd'),
                    ),
                    array(
                        'key'       => 'event_type_town',
                        'compare'   => '==',
                        'value'     => 'event_hosting',
                    ),
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '0',
                    )
                );
            } else if ($event_type == 'townhall_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'event_type_town',
                        'compare'   => '==',
                        'value'     => 'event_attending',
                    ),
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '1',
                    )
                );
            } else if ($event_type == 'all_townhall_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '1',
                    )
                );
            } else if ($event_type == 'attending_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'event_type_town',
                        'compare'   => '==',
                        'value'     => 'event_attending',
                    ),
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '0',
                    )
                );
            }
        }

        self::maybe_switch_to_blog();
        $the_query = new \WP_Query($args);
        self::maybe_restore_blog();
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
                    'date'     => self::get_formated_date(get_field('event_date', $id)),
                    'event_type'     => get_field('event_type', $id),
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

    public static function get_all_townhall_event_result()
    {
        $stack  = [];
        $filterby = '';
        $q = '';
        $action = get_query_var('action');
        $event_type = get_query_var('event_type');
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
            'post_type' => array('event')
        );
        if (isset($tax_query) && !empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }
        if (isset($q) && !empty($q)) {
            $args['s'] = $q;
        }
        $args['meta_query'] = array(
            'relation'      => 'AND',
            array(
                'key'       => 'is_townhall',
                'compare'   => '==',
                'value'     => '1',
            )
        );
        if (isset($event_type) && !empty($event_type)) {
            if ($event_type == 'upcoming_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'event_date',
                        'compare'   => '>=',
                        'value'     => date('Ymd'),
                    ),
                    array(
                        'key'       => 'event_type_town',
                        'compare'   => '==',
                        'value'     => 'event_hosting',
                    ),
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '0',
                    )
                );
            } else if ($event_type == 'townhall_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'event_type_town',
                        'compare'   => '==',
                        'value'     => 'event_attending',
                    ),
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '1',
                    )
                );
            } else if ($event_type == 'all_townhall_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '1',
                    )
                );
            } else if ($event_type == 'attending_event') {
                $args['meta_query'] = array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'event_type_town',
                        'compare'   => '==',
                        'value'     => 'event_attending',
                    ),
                    array(
                        'key'       => 'is_townhall',
                        'compare'   => '==',
                        'value'     => '0',
                    )
                );
            }
        }

        self::maybe_switch_to_blog();
        $the_query = new \WP_Query($args);
        self::maybe_restore_blog();
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
                    'date'     => self::get_formated_date(get_field('event_date', $id)),
                    'event_type'     => get_field('event_type', $id),
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

    public static function maybe_switch_to_blog()
    {
        if (get_field('global_events', 'option')) {
            switch_to_blog(1);
        }
    }

    public static function maybe_restore_blog()
    {
        if (get_field('global_events', 'option')) {
            restore_current_blog();
        }
    }
}
