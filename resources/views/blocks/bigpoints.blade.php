{{--
    Title: Bigpoints
    Description: Bigpoints Text
    Category: layout
    Icon: editor-alignleft
    Keywords: Bigpoints introduction text
    Mode: edit
    Align: left
    PostTypes: page post event video casestudy publication post people news
    SupportsAlign: left right
    SupportsMode: false
    SupportsMultiple: true
  --}}
  
  <section class="bigpoints_section" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
      <div class="section-inner">
          <div class="card-container @field('background_style')">
              <div class="row topContentBlock">
                  <div class="col-xs-12 @hasfield('description') col-md-6  @endfield">
                      <h3>@field('title')</h3>
                  </div>
                  @hasfield('description') 
                  <div class="col-xs-12 col-md-6">
                      <p>
                          @field('description')
                      </p>
                      </div>
                      @endfield
                  </div>
                  @hasfield('bigpoints_blocks')
                  @set($bigpoints_blocks, get_field('bigpoints_blocks'))
                  <div class="row">
                      @fields('bigpoints_blocks')
                          <div class="col-xs-12 @if(count($bigpoints_blocks) > 3) col-sm-6 col-md-3 @else col-sm-3 col-md-4 @endif">
                              <div class="box">
                                  <div class="imgWrapper">
                                      <img src="@sub('icon')" alt="">
                                  </div>
                                  <div class="textWrapper">
                                    @hassub('title')
                                      <p class="p-0">@sub('title')</p>
                                      @endsub
                                      @hassub('description')
                                      <p class="p-2">@sub('description')</p>
                                      @endsub
                                  </div>
                              </div>
                          </div>
                      @endfields
                  </div>
              @endfield
          </div>
      </div>
  </section>
  