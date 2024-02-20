{{--
  Title: Video
  Description: Video
  Category: layout
  Icon: editor-alignleft
  Keywords: Video introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="videoSection @isfield('layout_style', '2cols') two_col @endfield @isfield('layout_style', 'full_width') full @endfield @isfield('layout_style', 'full_width_no_margin') nomargin @endfield" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="section-inner">
        <div class="container @isfield('layout_style', '2cols') fluid @endfield">
        <div class="row videoRow">
            @hasfield('title')
            <div class="col-xs-12 @isfield('layout_style', '2cols') col-lg-6 pl-0 @else col-lg-12 @endfield">
                <div class="box contentBox ">
                    <h3>
                        @field('title')
                    </h3>
                    <p>
                        @field('description')
                    </p>
                    @hasfield('target_page')
                    <a href="@field('target_page', 'url')" class="btn--primary-light large basic">
                        @field('target_page', 'title')
                        </a>
                    @endfield
                </div>
            </div>
            @endfield
            <div class="col-xs-12 @isfield('layout_style', '2cols') col-lg-6 @else col-lg-12 @endfield pl-0 pr-0">
                @hasfield('video_url')
                <div class="videoWrapper">
                    <div class="box videoBox @hasfield('autoplay') autoplay @endfield">
                        @hasfield('poster_image')
                        <div class="poster_image" style="background-image: url(@field('poster_image'))">
                            <img class="play" src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/play_button.svg">
                        </div>
                        <iframe src="@field('video_url')?loop=1&autopause=0&autoplay=0" frameborder="0" allow="autoplay"></iframe>
                        @endfield
                        @hasfield('autoplay')
                        <iframe src="@field('video_url')?autoplay=1&loop=1&autopause=0&muted=1" allow="autoplay" frameborder="0"></iframe>
                        @endfield
                    </div>
                </div>
                @endfield
            </div>
        </div>
        </div>
    </div>
</section>

<script src="https://player.vimeo.com/api/player.js"></script>
