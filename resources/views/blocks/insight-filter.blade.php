{{--
  Title: InsightFilter
  Description: InsightFilter Text
  Category: layout
  Icon: editor-alignleft
  Keywords: InsightFilter introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set(
    $filters,
    Filter::get_filters(
        [
            'publication' => 'Publication',
            'video' => 'Video',
            'post' => 'Blog',
            'news' => 'News',
        ],
        'cpt_type_filter',
    )
)
@include('partials.common-filter', $filters)
