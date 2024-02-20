{{--
  Title: Accordion
  Description: Accordion Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Accordion introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="accordionSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="section-inner">
        <div class="row">
                    <div class="col-xs-12 col-md-6  @hasfield('only_Accordion') hide @endfield">
                <div class="box">
                    <h3>@field('left_title')</h3>
                    <p>@field('left_copy')</p>
                </div>
            </div>
            <div class="col-xs-12 @hasfield('left_title') col-md-6 @endfield    @hasfield('only_Accordion') col-md-9 center @endfield">
                <div class="box contentBox">
                    @hasfield('accordions')
                    <div class="accordion">
                        @fields('accordions')
                        <div class="accordion-item">
                            <div class="accordion-title">
                                <p class="p-0">@sub('title')</p>
                                <span class="icon">&#43;</span>
                            </div>
                            <div class="accordion-content">
                                <p class="p-2">@sub('description')</p>
                                <div class="row extra_info">
                                    <div class="col-xs-12 col-lg-6 pl-0">
                                       @hassub('telephone')
                                        <div class="telephone icon-wrapper">
                                            <img class="icon"
                                            src="/app/themes/cmspi/resources/assets/images/phone.svg">
                                            <a href="tel:@sub('telephone')"> @sub('telephone')</a>
                                        </div>
                                        @endsub
                                        @hassub('email')
                                        <div class="email icon-wrapper">
                                            <img class="icon"
                                            src="/app/themes/cmspi/resources/assets/images/envelope.svg">
                                            <a href="mailto:@sub('email')"> @sub('email')</a>
                                        </div>
                                        @endsub
                                    </div>
                                    <div class="col-xs-12 col-lg-6 pl-0">
                                        @hassub('address')
                                        <div class="address icon-wrapper">
                                            <img class="icon"
                                            src="/app/themes/cmspi/resources/assets/images/adress.svg">
                                            @sub('address')
                                        </div>
                                        @endsub
                                        @hassub('google_map_url')
                                        <div class="google_map_url">
                                            <a href="@sub('google_map_url')" class="btn--secondary medium basic" target="_blank">
                                                Google Maps <img class="icon"
                                            src="/app/themes/cmspi/resources/assets/images/external_link.svg">
                                            </a>
                                        </div>
                                        @endsub
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfields
                    </div>
                    @endfield
                </div>
            </div>
        </div>
    </div>
</section>
