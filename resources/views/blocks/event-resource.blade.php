{{--
  Title: Event Resources
  Description: Event Resources Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Event Resources introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="eventResourceSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($event_resourcesData, EventResource::get_event_resource_data())

    <div class="section-inner">
        @hasfield('title')
        <h3>
            @field('title')
            </h3>
        @endfield

        <div class="card-container">
            <div class="row">
                @foreach ($event_resourcesData as $event_resource)
                    <div class="col-xs-12 col-lg-4 cardCol">
                        <div class="box">
                            <div class="box_body">
                                <div class="content">
                                    <div class="imgWrapper">
                                        <img class="top_image" src="{{ $event_resource['featured_image'] }}"
                                            alt="">
                                        @notempty($event_resource['date'])
                                            <div class="date">
                                                <span>
                                                <p class="p-3">{{ $event_resource['date'] }}
                                                </p>
                                                </span>
                                            </div>
                                        @endnotempty
                                    </div>
                                    <div class="contentWrapper">
                                        @notempty($event_resource['title'])
                                            <p><strong>{{ $event_resource['title'] }}</strong></p>
                                        @endnotempty
                                        <div class="bottomContent">
                                            <div class="termsWrapper">
                                                @notempty($event_resource['region_terms'])
                                                    <div class="terms">
                                                    <img src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/region_icon.svg">

                                                    <p class="p-3">{{ $event_resource['region_terms'] }}</p></div>
                                                @endnotempty
                                                @notempty($event_resource['presence_terms'])
                                                    <div class="terms">
                                                    <img src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/presence_icon.svg">
                                                    <p class="p-3">{{ $event_resource['presence_terms'] }}</p>
                                                </div>
                                                @endnotempty
                                            </div>
                                            @notempty($event_resource['page_link'])
                                                <div class="btnWrapper">
                                                    <a href="{{ $event_resource['page_link'] }}"
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
                <a href="@field('target_page', 'url')" class="btn--secondary large">
                    @field('target_page', 'title')
                    </a>
                </div>
            </div>
        @endfield
    </div>
</section>
