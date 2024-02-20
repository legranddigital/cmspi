{{--
  Title: People
  Description: People Description
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

@set($peoplesData, People::get_people_data('people_cpt'))
@set($layout_style, $peoplesData['layout_style'])
@set($layout_style_class, $peoplesData['layout_style_class'])
@set($carousel_class, $peoplesData['carousel_class'])

@if ($peoplesData['display_in_grid'])
    <section class="peopleListingSection people_section" @hasfield('unique_id') id="@field('unique_id')" @endfield>
        <div class="section-inner">
            <div class="card-container">
                <div class="row gridRow">
                    @foreach ($peoplesData['data'] as $item)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 cardCol">
                            <div class="box">
                                <div class="box_body">
                                    <div class="content">
                                        <div class="imgWrapper">
                                            <img src="{{ $item['profile_image'] }}" alt="">
                                        </div>
                                        <div class="textWrapper">
                                            <h4>{{ $item['first_name'] }} {{ $item['last_name'] }}</h4>
                                            <p class="p-2">{{ $item['position'] }}</p>
                                            <p class="p-3 company">{{ $item['company'] }}</p>
                                        </div>
                                    </div>
                                    <div class="btnWrapper block-btn">
                                        @if (!empty($item['email']))
                                            <a href="{{ $item['email'] }}" class="circleAndTextBtn btn-light">
                                                <div class="btnInner">
                                                    <div class="circle">
                                                        <img
                                                            src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/arrow-right-large-black.svg">
                                                    </div>
                                                    <span>@hasoption('get_in_touch')@option('get_in_touch')@endoption</span>
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
    </section>
@else
    @if ($layout_style == 'grid')
        <section class="people_section" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
            <div class="section-inner">

                <div class="card-container {{ $layout_style }} {{ $layout_style_class }}">
                    <div class="wrapper">
                        @hasfield('title')
                        <h3>@field('title')</h3>
                        @endfield
                        @hasfield('copy')
                        <p>@field('copy')</p>
                        @endfield
                    </div>
                    @if ($carousel_class == 'people_carousel')
                        <div class="{{ $carousel_class }}">
                            @foreach ($peoplesData['data'] as $item)
                                <div class="peopleSlide">
                                    <div class="box">
                                        <div class="box_body">
                                            <div class="content">
                                                <div class="imgWrapper">
                                                    <a href="{{ $item['page_link'] }}">
                                                        <img src="{{ $item['profile_image'] }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="textWrapper">
                                                    <h4>{!! $item['first_name'] !!}</h4>
                                                    <h4>{!! $item['last_name'] !!}</h4>
                                                    <p class="p-2">{!! $item['position'] !!}</p>
                                                    <p class="p-3 company">{!! $item['company'] !!}</p>
                                                </div>
                                            </div>
                                            <div class="btnWrapper block-btn">
                                                <a class="btn--secondary-light medium"
                                                    href="{{ $item['linkedin_url'] }}">
                                                    @field('connect_button_label')
                                                    <img class="linkedin"
                                                        src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/linkedin_white.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="container slick-slider-dots"></div> --}}
                    @else
                        <div class="row">
                            @foreach ($peoplesData['data'] as $item)
                                <div class="col-xs-12 col-lg">
                                    <div class="box">
                                        <div class="box_body">
                                            <div class="content">
                                                <div class="imgWrapper">
                                                    <a href="{{ $item['page_link'] }}">
                                                        <img src="{{ $item['profile_image'] }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="textWrapper">
                                                    <h4>{!! $item['first_name'] !!}</h4>
                                                    <h4>{!! $item['last_name'] !!}</h4>
                                                    <p class="p-2">{!! $item['position'] !!}</p>
                                                    <p class="p-3 company">{!! $item['company'] !!}</p>
                                                </div>
                                            </div>
                                            <div class="btnWrapper block-btn">
                                                <a class="btn--secondary-light medium"
                                                    href="{{ $item['linkedin_url'] }}">
                                                    <span class="btn_label">@field('connect_button_label')</span>
                                                    <img class="linkedin"
                                                        src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/linkedin_white.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @else
        <div class="half_bg_overlay">
            <section class="people_section" @hasfield('scroll_id') id="@field('scroll_id')
"
            @endfield>
            <div class="section-inner">
                <div class="card-container {{ $layout_style }} {{ $layout_style_class }}">
                    @hasfield('title')
                    <h3>
                        @field('title')
                        </h3>
                    @endfield
                    <div class="row end-xs boxRow">

                        @foreach ($peoplesData['data'] as $item)
                            <div class="col-xs-12 col-lg-{{ $peoplesData['layout_col'] }} boxCol">
                                <div class="box">
                                    <div class="box_body">
                                        <div class="content">
                                            <div class="imgWrapper">
                                                <a href="{{ $item['page_link'] }}">
                                                    <img src="{{ $item['profile_image'] }}" alt="">
                                                </a>
                                            </div>
                                            <div class="textWrapper">
                                                <p class="p-2 company">{!! $item['company'] !!}</p>
                                                <h4>{!! $item['first_name'] !!}
                                                    {!! $item['last_name'] !!}
                                                </h4>
                                                <p class="p-2">{!! $item['position'] !!}</p>
                                                <p class="p-3 location">{!! $item['location'] !!}</p>
                                                <p class="p-2">{!! $item['short_description'] !!}</p>
                                            </div>
                                        </div>
                                        <div class="btnWrapper">
                                            <a href="mailto:{{ $item['email'] }}" class="btn-with-arrow">
                                                <div class="btn-with-arrow">
                                                    <div class="circle">
                                                        <img
                                                            src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/arrow-right-medium-black.svg">
                                                    </div>
                                                    <p>@field('get_in_touch_button_label')</p>
                                                </div>
                                            </a>
                                            <a class="btn--secondary-light medium"
                                                href="{{ $item['linkedin_url'] }}">
                                                <span class="btn_label">@field('connect_button_label')</span>
                                                <img class="linkedin"
                                                    src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/linkedin_white.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@endif
