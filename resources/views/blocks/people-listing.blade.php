{{--
  Title: People Listing
  Description: People Listing Description
  Category: layout
  Icon: editor-alignleft
  Keywords: People introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($resultData, People::get_people_listing())
@set($max_num_pages, $resultData['max_num_pages'])
@set($found_posts, $resultData['found_posts'])
@notempty($resultData['data'])
    <section class="peopleListingSection people_section" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
        <div class="section-inner">
            <div class="card-container">
                <div class="row gridRow">
                    @foreach ($resultData['data'] as $item)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 cardCol">
                            <div class="box">
                                <div class="box_body">
                                    <div class="content">
                                        <div class="imgWrapper">
                                        <a href="{{ $item['page_link'] }}">
                                            <img src="{{ $item['profile_image'] }}" alt="">
                                        </a>
                                        </div>
                                        <div class="textWrapper">
                                            <h4>{{ $item['first_name'] }} {{ $item['last_name'] }}</h4>
                                            <p class="p-2">{{ $item['position'] }}</p>
                                            <p class="p-3 location">{{ $item['location'] }}</p>
                                        </div>
                                    </div>
                                    <div class="btnWrapper block-btn">
                                        @if (!empty($item['email']))
                                            <a href="mailto:{{$item['email']}}" class="circleAndTextBtn btn-light">
                                                <div class="btnInner">
                                                    <div class="circle">
                                                        <img
                                                            src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/arrow-right-large-black.svg">
                                                    </div>
                                                    <p class="p-2">@hasoption('get_in_touch')@option('get_in_touch')@endoption</p>
                                                </div>
                                            </a>
                                        @endif
                                        @if (!empty($item['linkedin_url']))
                                            <a class="btn--secondary-light small" href="{{ $item['linkedin_url'] }}">
                                            @hasoption('connect')@option('connect')@endoption
                                                <img class="linkedin"
                                                    src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/linkedin_white.svg">
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @set($custom_pagination, App\custom_pagination($max_num_pages, $found_posts))
        @notempty($custom_pagination)
            <div class="pagination">
          
                <div class="numbersWrapper">
                    @foreach (array_slice($custom_pagination, 1, -1) as $item)
                        {!! $item !!}
                    @endforeach
                </div>
               
            </div>
        @endnotempty
    </section>
@endnotempty
