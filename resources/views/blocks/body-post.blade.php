{{--
  Title: BodyPost
  Description: BodyPost Text
  Category: layout
  Icon: editor-alignleft
  Keywords: BodyPost introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="bodyPostSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($bodyPostData, BodyPost::get_body_post_data())
    @set($layout_style_class, $bodyPostData['layout_style_class'])
    <div class="section-inner">
        <div class="body_post_block {{ $layout_style_class }}">
            <div class="row middle-xs @field('layout_style') @field('without_image_layout_style') @field('with_image_layout_style')">
                @foreach ($bodyPostData['data'] as $item)
                    <div class="col-xs-12 {{$bodyPostData['layout_col']}} noImg">
                        <div class="box">
                        @if ($item['large_title'])
                            <h3>{!! $item['large_title'] !!}</h3>
                        @endif
                        @if ($item['medium_title'])
                            <h4>{!! $item['medium_title'] !!}</h4>
                        @endif
                            @if ($item['title'])
                            <p class="strong">{!! $item['title'] !!}</p>
                        @endif
                            @if ($item['small_title'])
                            <p class="p-1"><strong>{!! $item['small_title'] !!}</strong></p>
                        @endif
                            @if ($item['body'])
                            <p>
                                {!! $item['body'] !!}
                            </p>
                        @endif
                            @if ($item['target_page'])
                                <a href="{{ $item['target_page']['url'] }}"
                                    class="btn--secondary medium">{{ $item['target_page']['title'] }}</a>
                            @endif
                            
                        </div>
                    </div>
                    @isfield('layout_style', 'with_image')
                    <div class="col-xs-12 {{$bodyPostData['layout_col']}} inner imgWrapper">
                        <img src="{{ $item['image'] }}" alt="">
                    </div>
                    @endfield
                @endforeach

            </div>
        </div>
    </div>
</section>
