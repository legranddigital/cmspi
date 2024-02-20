{{--
  Title: EventFilter
  Description: EventFilter Text
  Category: layout
  Icon: editor-alignleft
  Keywords: EventFilter introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($filters, Filter::get_filters('event'))
<input type="hidden" class="filter_event_type" data-target="@field('result_page', 'url')" data-posttype="event" value="@field('filter_event_type')" />
<section class="commonFilterSection eventFilter">
    <div class="section-inner">
        <div class="filters">
            <div class="filter">
                <div class="custom_dropdown all" data-tax="region">
                    <div class="select_box" data-slug="all">
                        <span class="placeholder">All</span>
                    </div>
                </div>
		@if(isset($filters['region']))
                @foreach ($filters['region']['terms'] as $term)
                    <div class="custom_dropdown" data-tax="region">
                        <div class="select_box" data-slug="{{ $term['slug'] }}">
                            <span class="placeholder">{!! $term['name'] !!}</span>
                        </div>
                    </div>
                @endforeach
		@endif
        </div>
        <div class="search">
            <div class="searchInputWrapper">
                <img class="searchIcon"
                    src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/search.svg">
                <input type="text" placeholder="@hasoption('search')@option('search')@endoption" class="filterSearchInput" />
            </div>
        </div>
    </div>
</div>
</section>
