<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $partial
 * @return mixed
 */
function get_field_partial($partial)
{
    $partial = str_replace('.', '/', $partial);
    return include(config('theme.dir') . "/app/fields/{$partial}.php");
}

function populate_children($menu_array, $menu_item)
{
    $children = array();
    if (!empty($menu_array)) {
        foreach ($menu_array as $k => $m) {
            if ($m->menu_item_parent == $menu_item->ID) {
                $current = ($m->object_id == get_queried_object_id()) ? 'current' : '';
                $children[$m->ID] = array();
                $children[$m->ID]['ID'] = $m->ID;
                $children[$m->ID]['title'] = $m->title;
                $children[$m->ID]['url'] = $m->url;
                $children[$m->ID]['current'] = $current;
                $children[$m->ID]['classes'] = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $m->classes ), $m) ) );
                unset($menu_array[$k]);
                $children[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    };
    return $children;
}

function get_menu_array($theme_location)
{
    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_array = wp_get_nav_menu_items($menu->term_id);
        $menu = array();

        foreach ($menu_array as $m) {
            if (empty($m->menu_item_parent)) {
                $current = ($m->object_id == get_queried_object_id()) ? 'current' : '';
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['current'] = $current;
                $menu[$m->ID]['classes'] = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $m->classes ), $m) ) );
                $menu[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }

        return $menu;
    }
    return false;
}

function custom_pagination($max_num_pages, $found_posts, $args = array())
{
    $output = [];

    if ($max_num_pages <= 1) {
        return;
    }

    $paged = max(1, get_query_var('paged'));

    $pagination_args = array(
        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'total'        => $max_num_pages,
        'current'      => $paged,
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'array',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        'prev_text'    => sprintf(
            '<i></i> %1$s',
            apply_filters(
                'custom_pagination_page_numbers_previous_text',
                __('Previous', 'text-domain')
            )
        ),
        'next_text'    => sprintf(
            '%1$s <i></i>',
            apply_filters(
                'custom_pagination_page_numbers_next_text',
                __('Next', 'text-domain')
            )
        ),
        'add_args'     => false,
        'add_fragment' => '',
        'show_page_position' => false,
    );

    $pagination_args = apply_filters('custom_pagination_args', array_merge($pagination_args, $args), $pagination_args);

    $output = paginate_links($pagination_args);
    if (true == $pagination_args['show_page_position'] && $max_num_pages > 0) {
        $output[] = '<span class="page-of-pages">' .
            sprintf(__('Page %1s of %2s', 'text-domain'), $pagination_args['current'], $max_num_pages) .
            '</span>';
    }

    if ($found_posts > 5) {
        if ($paged == 1) {
            array_unshift($output, '<div class="disabled prev page-numbers">' . __('Previous', 'text-domain') . '</div>');
        }
        if ($paged == $max_num_pages) {
            array_push($output, '<div class="disabled next page-numbers">' . __('Next', 'text-domain') . '</div>');
        }
    }

    return $output;
}
