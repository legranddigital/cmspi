<?php
namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

acf_add_options_page([
    'page_title' => get_bloginfo('name'),
    'menu_title' => 'Theme Options',
    'menu_slug' => 'theme-options',
    'update_button' => 'Update Options',
    'capability' => 'edit_theme_options',
    'position' => '2',
    'autoload' => true,
]);

$options = new FieldsBuilder('theme_options');

$options
    ->setLocation('options_page', '==', 'theme-options');

$options
  ->addTab('general')
    ->setConfig('placement', 'left')
    ->addImage('logo', ['return_format' => 'url'])
    ->addLink('contact_button_link', [
      'return_format' => 'array',
    ])
    ->addText('share', [
      'value' => 'Share',
    ])
    ->addText('dropdown_subnav')
    ->addText('select_country_dropdown', [
      'value' => 'Select a country',
    ])
    ->addText('submit', [
      'value' => 'Submit',
    ])
    ->addText('search', [
      'value' => 'Search',
    ])
    ->addText('connect', [
      'value' => 'Connect',
    ])
    ->addText('get_in_touch', [
      'value' => 'Get in touch',
    ])
    ->addText('filter', [
      'value' => 'Filter',
    ])
    ->addText('next', [
      'value' => 'Next',
    ])
    ->addRepeater('countries', [
      'layout' => 'block'
    ])
    ->addLink('continent', [
      'return_format' => 'array',
    ])
    ->addRepeater('countries_list', [
      'layout' => 'block'
    ])
      ->addLink('country', [
        'return_format' => 'array',
      ])
      ->endRepeater()
    ->endRepeater()

    ->addTab('footer')
      ->setConfig('placement', 'left')
      ->addText('footer_copyright')
      ->addRepeater('link_section', [
          'max' => 3,
          'button_label' => 'Add Link Section',
          'layout' => 'block', 
      ])
        ->addText('title')
        ->addRepeater('links', [
          'max' => 5,
          'button_label' => 'Add Link',
          'layout' => 'block',
        ])
          ->addLink('target_link', [
            'return_format' => 'array',
          ])
          ->endRepeater()
        ->endRepeater()
      ->addText('newsletter_title')
      ->addText('newsletter_form_link')
      ->addText('placeholder_newsletter_form_input')
      ->addText('linkedin_btn_text')
      ->addText('linkedin_url')
      ->addTab('settings')
      ->setConfig('placement', 'left')
		->addTrueFalse('global_insights', ['ui' => 1, 'instructions' => 'This option will allow Insights page to display posts from CMSPI Global site instead of broadcasted posts. This is a temporary solution until posts import is completed.'])
		->addTrueFalse('global_events', ['ui' => 1, 'instructions' => 'This option will allow Events page to display posts from CMSPI Global site instead of broadcasted posts. This is a temporary solution until events import is completed.']);
return $options;
