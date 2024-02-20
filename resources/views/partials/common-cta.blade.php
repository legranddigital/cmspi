<section class="ctaBlockSection" @hasfield('scroll_id') id="@field('scroll_id')
" @endfield>
<div class="section-inner">
    <div class="container">
        @hasfield('cta_blocks')
        @php
            $cta_blocks = get_field('cta_blocks');
            $layout_style = 'box-' . count($cta_blocks);
        @endphp
        <div class="row {{ $layout_style }}">
            @fields('cta_blocks')
                <div class="col-xs ctaCol">
                    <div class="box ctaBox">
                        <div class="content_wrapper">
                            <div class="content @isfield('block_style', 'center-align') center-align @endfield">
                                @hassub('title')
                                <h3 class="title">@sub('title')</h3>
                                @endsub
                                @hassub('sub_title')
                                <p class="p-0">@sub('sub_title')</p>
                                @endsub
                                @hassub('body')
                                <p class="p-2">@sub('body')</p>
                                @endsub
                                @hassub('target_page')
                                <a href="@sub('target_page', 'url')"
                                    class="btn--primary-light basic large @isfield('block_style', 'center-align') center-align @endfield">
                                    @sub('target_page', 'title')
                                    </a>
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
</section>
