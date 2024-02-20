<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function getChildPageData()
    {
        $current_page_id = get_the_ID();

        $child_pages = get_pages(array(
            'child_of' => $current_page_id,
        ));
        
        $stack = array();
        if ($child_pages) {
            foreach ($child_pages as $child_page) {
                $stack[] = [
                    'title'=> $child_page->post_title,
                    'link'=> get_permalink($child_page->ID)
                ];
            }
        }

        return $stack;
    }
}
