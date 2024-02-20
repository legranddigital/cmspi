{{--
  Title: People Filter
  Description: People Filter Text
  Category: layout
  Icon: editor-alignleft
  Keywords: People Filter introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($filters, Filter::get_filters('people'))
@include('partials.common-filter', $filters)
