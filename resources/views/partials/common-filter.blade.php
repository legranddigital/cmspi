<section class="commonFilterSection">
    <div class="section-inner">
        <div class="filters">
            <div class="filter">
                @foreach ($filters as $k => $v)
                    <div class="custom_dropdown" data-tax="{{ $k }}">
                        <div class="select_box">
                            <span class="placeholder">{!! $v['label'] !!}</span>
                            <div class="arrow"></div>
                        </div>
                        <div class="options">

                            @if (isset($v['terms']) && !empty($v))
                                @foreach ($v['terms'] as $term)
                                    <label>
                                        <input type="checkbox" data-slug="{{ $term['slug'] }}"
                                            data-taxonomy="{{ $term['taxonomy'] ?? '' }}"
                                            data-posttype="{{ $term['post_type'] ?? '' }}">{!! $term['name'] !!}
                                    </label>
                                @endforeach
                            @else
                                <label>No options</label>
                            @endif
                        </div>
                    </div>
                @endforeach

                @hasfield('result_page')
                <a href="javascript:void(0);" data-target="@field('result_page', 'url')
"
                    class="btn--secondary medium filterBtn">@hasoption('filter')@option('filter')@endoption</a>
            @else
                <a href="javascript:void(0);" data-target="@php echo get_post_type_archive_link( 'people' ); @endphp"
                    class="btn--secondary medium filterBtn">@hasoption('filter')@option('filter')@endoption</a>
            @endfield
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
