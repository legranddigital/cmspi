{{--
  Title: UpcomingEvents
  Description: UpcomingEvents Text
  Category: layout
  Icon: editor-alignleft
  Keywords: UpcomingEvents introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($resData, Event::get_upcomingEvents_data())
<section class="upcomingEventsSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>

    <div class="section-inner">
        <h3>@field('title')</h3>
        <p class="p-2">@field('body')</p>
        <div class="card-container">
            <div class="row">
                @foreach ($resData as $event)
                    @if ($event['grid_class'] == 'full')
                        <div class="col-xs-12 col-lg-6 {{ $event['grid_class'] }} pr-0 gridCol">
                            <div class="imgWrapper">
                                <img class="top_image" src="{{ $event['featured_image'] }}" alt="">
                                @notempty($event['date'])
                                    <div class="date">
                                        <span>
                                            <p class="p-3">{{ $event['date'] }}
                                            </p>
                                        </span>
                                    </div>
                                @endnotempty
                            </div>
                        </div>
                    @endif
                    <div
                        class="col-xs-12 col-lg-6 {{ $event['grid_class'] }} @if ($event['grid_class'] == 'full') pl-0 @endif gridCol">
                        <div class="box">
                            <div class="box_body">
                                <div class="content h-100">
                                    @if ($event['grid_class'] == 'half')
                                        <div class="imgWrapper">
                                            <img class="top_image" src="{{ $event['featured_image'] }}" alt="">
                                            @notempty($event['date'])
                                                <div class="date">
                                                    <span>
                                                        <p class="p-3">{{ $event['date'] }}
                                                        </p>
                                                    </span>
                                                </div>
                                            @endnotempty
                                        </div>
                                    @endif
                                    <div class="contentWrapper">
                                        <div class="topContent">
                                            @notempty($event['tags'])
                                                <div class="tags">{!! $event['tags'] !!}</div>
                                            @endnotempty
                                            @notempty($event['name'])
                                                <p class="p-0">
                                                    <strong>
                                                        {!! $event['name'] !!}
                                                    </strong>
                                                </p>
                                            @endnotempty
                                            @notempty($event['short_description'])
                                                <p class="p-2 truncate">{{ $event['short_description'] }}</p>
                                            @endnotempty
                                        </div>
                                        <div class="bottomContent">
                                            <div class="leftContent">
                                                <div class="d-flex align-items-center">
                                                    <img
                                                        src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/presence_icon.svg">

                                                    <p class="p-3">{{ $event['event_type']['label'] }}</p>
                                                </div>
                                                <div class="termsWrapper">
                                                    @notempty($event['region_terms'])
                                                        <div class="d-flex align-items-center">
                                                            <img
                                                                src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/region_icon.svg">

                                                            <p class="p-3">{{ $event['region_terms'] }}</p>
                                                        </div>
                                                    @endnotempty
                                                </div>
                                            </div>
                                            @notempty($event['page_link'])
                                                <div class="btnWrapper">
                                                    <a href="{{ $event['page_link'] }}"
                                                        class="btn--primary small arrow-cicle"></a>
                                                </div>
                                            @endnotempty
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @hasfield('target_page')
        <div class="row center-xs cta">
            <div class="col-12">
                <a href="@field('target_page', 'url')" class="btn--secondary basic medium">
                    Show more
                    </a>
                </div>
            </div>
        @endfield
    </div>
</section>
