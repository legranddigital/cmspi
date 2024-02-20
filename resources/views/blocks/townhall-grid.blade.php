{{--
  Title: Townhall grid
  Description: Townhall grid Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Townhall grid introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($resData, Event::get_townhall_grid_data())
<section class="townhallGridSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="section-inner">
        @hasfield('title')
        <h3>
            @field('title')
            </h3>
        @endfield

        <div class="card-container">
            <div class="row">
                @foreach ($resData as $event)
                    <div class="col-xs-12 col-lg-4 cardCol">
                        <div class="box">
                            <div class="box_body">
                                <div class="content">
                                    <div class="imgWrapper">
                                        <img class="top_image" src="{{ $event['featured_image'] }}"
                                            alt="">
                                        @notempty($event['date'])
                                            <div class="date">
                                                <span>
                                                <p class="p-3">{{ $event['date'] }}
                                                </p>
                                                </span>
                                            </div>
                                        @endnotempty
                                    </div>
                                    <div class="contentWrapper">
                                        @notempty($event['title'])
                                            <p><strong>{!! $event['title'] !!}</strong></p>
                                        @endnotempty
                                        <div class="bottomContent">
                                            <div class="termsWrapper">
                                                @notempty($event['event_type'])
                                                    <div class="terms">
                                                    <img src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/region_icon.svg">
                                                    <span class="p-3">{!! $event['event_type']['label'] !!}</span></div>
                                                @endnotempty
                                                @notempty($event['presence_terms'])
                                                    <div class="terms">
                                                    <img src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/presence_icon.svg">
                                                    <p class="p-3">{{ $event['presence_terms'] }}</p>
                                                </div>
                                                @endnotempty
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
        <div class="row center-xs">
            <div class="col-12 ctaBtnWrapper">
                <a href="@field('target_page', 'url')" class="btn--secondary basic medium">
                    Show more
                    </a>
                </div>
            </div>
        @endfield
    </div>
</section>
