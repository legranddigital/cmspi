{{--
  Title: Casestudy Filter
  Description: Casestudy Filter Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Casestudy Filter introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($filters, Filter::get_filters('casestudy'))
@include('partials.common-filter', $filters)