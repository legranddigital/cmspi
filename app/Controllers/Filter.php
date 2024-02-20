<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Filter extends Controller
{
    public static function get_filters($post_types, $isCptFilterType = '')
    {
        self::maybe_switch_to_blog($post_types);

        global $wpdb;
        $stack  = [];

        if ($isCptFilterType) {
            $stack['cpt'] = [
                'label' => 'Type',
                'terms' => []
            ];
            foreach ($post_types as $key => $post_type) :
                $stack['cpt']['terms'][] = [
                    'name' => $post_type,
                    'slug' => $key
                ];
            endforeach;
        }

        if (!is_array($post_types)) {
            $post_types = [$post_types];
        } else {
            $post_types = array_keys($post_types);
        }
        foreach ($post_types as $post_type) :
            $taxonomies = get_object_taxonomies($post_type, 'objects');
            foreach ($taxonomies as $taxonomy => $obj) :
                if ($taxonomy === 'category' && $post_type !== 'publication') {
                    continue;
                }
                $sql = $wpdb->prepare(
                    "SELECT t.*, tt.* FROM {$wpdb->terms} AS t
                    INNER JOIN {$wpdb->term_taxonomy} AS tt ON t.term_id = tt.term_id
                    INNER JOIN {$wpdb->term_relationships} AS tr ON tr.term_taxonomy_id = tt.term_taxonomy_id
                    INNER JOIN {$wpdb->posts} AS p ON p.ID = tr.object_id
                    WHERE p.post_type = %s AND tt.taxonomy = %s
                    GROUP BY t.term_id",
                    $post_type,
                    $taxonomy
                );
                $terms = $wpdb->get_results($sql);

                if (!empty($terms)) {
                    if ($taxonomy === 'category' && $post_type === 'publication') {
                        foreach ($terms as $term) :
                            $stack['cpt']['terms'][] = [
                                'name' => $term->name,
                                'slug' => $term->slug,
                                'taxonomy' => $taxonomy,
                                'post_type' => $post_type,
                            ];
                        endforeach;
                    } else {
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
                }

            endforeach;
        endforeach;
        self::maybe_restore_blog();
        return $stack;
    }

    public static function maybe_switch_to_blog($post_types)
    {
        if (get_field('global_insights', 'option') || get_field('global_events', 'option')) {
            switch_to_blog(1);
        }
    }

    public static function maybe_restore_blog()
    {
        if (get_field('global_insights', 'option') || get_field('global_events', 'option')) {
            restore_current_blog();
        }
    }
}
