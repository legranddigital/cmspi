<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Testimonial extends Controller
{
    public static function get_testimonial_data($cpt_field)
    {
        $stack  = [];
        $testimonial_ids = get_field($cpt_field);
        if ($testimonial_ids) {
            $stack = array_map(function ($tid) {
                return array(
                    'featured_image'   => get_the_post_thumbnail_url($tid,'full'),
                    'title'     => get_the_title($tid),
                    'title'     => get_the_title($tid),
                    'author'     => get_field('author', $tid),
                    'author_job_title'     => get_field('author_job_title', $tid),
                    'author_avatar'     => get_field('author_avatar', $tid),
                    'content'     => get_the_excerpt($tid),
                    'get_in_touch'     => get_field('get_in_touch', $tid),
                    'linkedin_link'     => get_field('linkedin_link', $tid),

                );
            }, $testimonial_ids);
        }
        
        return $stack;
    }
}