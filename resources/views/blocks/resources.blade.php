{{--
  Title: Resources
  Description: Resources Text
  Category: layout
  Icon: editor-alignleft
  Keywords: intro introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}
<section class="resourcesSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="row inner">
        <div class="col-xs-12 col-md-4">
            @hasfield('body')
            @field('body')
            @endfield
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="section-inner">
                <div class="row">
                    <div class="col-md-8">
                        @hasfield('copy')
                        @field('copy')
                        @endfield
                        @hasfield('target_links')
                        <select name="select">
                            @fields('target_links')
                                <option value="@sub('target_link', 'url')">@sub('target_link', 'title')</option>
                            @endfields
                        </select>
                        @endfield
                    </div>

                    @hasfield('button_label')
                    <div class="col-md-4 cta">
                        <a class="btn--primary-light large basic" href="#">
                            @field('button_label')
                            </a>
                        </div>
                    @endfield

                </div>
            </div>
        </div>
    </div>
</section>
