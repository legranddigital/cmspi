{{--
    Title: Content with icon
    Description: Content with icon
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
@hasfield('content_with_icon_blocks')
<section class="contentWithIconSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($contentWithIconData, ContentWithIcon::get_content_with_icon_data())
    @set($layout_style, $contentWithIconData['layout_style'])
    <div class="row {{ $layout_style }}">
        @foreach ($contentWithIconData['data'] as $item)
            <div class="col-xs">
                <div class="box">
                    <div class="contentWithIconBox">
                        <div class="row h-100 innerRow">
                            <div class="col-xs innerCol">
                                {{-- <div class="box"> --}}
                                <div class="content_wrapper">
                                    <div class="content">
                                        @if ($layout_style == 'box-3' || $layout_style == 'box-4')
                                            @notempty($item['image'])
                                                <div class="imgWrapper">
                                                    <img src="{{ $item['image'] }}" alt="">
                                                </div>
                                            @endnotempty
                                        @endif
                                        <div class="titleWrapper">
                                            @if ($layout_style == 'box-1' || $layout_style == 'box-2')
                                                <h3>{!! $item['title'] !!}</h3>
                                            @endif
                                            @if ($layout_style == 'box-3' || $layout_style == 'box-4')
                                                <h4>{!! $item['title'] !!}</h4>
                                            @endif
                                            @if ($layout_style == 'box-2')
                                                @notempty($item['image'])
                                                    <div class="imgWrapper">
                                                        <img src="{{ $item['image'] }}" alt="">
                                                    </div>
                                                @endnotempty
                                            @endif
                                        </div>
                                        <div class="p-1">{!! $item['body'] !!}</div>
                                    </div>
                                    @notempty($item['target_page']['url'])
                                        <a href="{{ $item['target_page']['url'] }}" class="learnMoreBtnLink">
                                            <div class="learnMoreBtn">
                                                <div class="circle">
                                                
                                                </div>
                                                <span>{{ $item['target_page']['title'] }}</span>
                                            </div>
                                        </a>
                                    @endnotempty
                                </div>
                                {{-- </div> --}}
                            </div>
                            @if ($layout_style == 'box-1')
                                @notempty($item['image'])
                                    <div class="col-xs inner imgWrapper">
                                        {{-- <div class="box"> --}}
                                        <img src="{{ $item['image'] }}" alt="">
                                        {{-- </div> --}}
                                    </div>
                                @endnotempty
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endfield
