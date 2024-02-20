{{--
  Title: IndustryGrid
  Description: IndustryGrid Text
  Category: layout
  Icon: editor-alignleft
  Keywords: IndustryGrid introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}
{{-- industry-grid --}}
<section class="industry_grid_section" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="section-inner">
        <div class="card-container industry_grid">
            @hasfield('industry_grid_blocks')
            <div class="row">
                @fields('industry_grid_blocks')
                    <div class="col-xs-12 col-lg-6">
                        <div class="box">
                            <div class="box_body">
                                <div class="content">
                                    <div class="imgWrapper">
                                        <img src="@sub('image')" alt="">
                                    </div>
                                    <div class="wrapper">

                                        @hassub('title')
                                            <h4>@sub('title')</h4>
                                        @endsub 
                                        
                                        @hassub('body')
                                            <p class="p-2">@sub('body')</p>
                                        @endsub 

                                        @hassub('target_page')
                                            <a href="@sub('target_page', 'url')" class="btn--secondary small">
                                        @field('button_label')
                                        </a>
                                        @endsub 
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endfields
                </div>
            @endfield
        </div>
    </div>
</section>
