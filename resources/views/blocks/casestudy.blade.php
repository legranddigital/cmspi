{{--
  Title: Casestudy
  Description: Casestudy Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Casestudy introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@set($casestudysData, Casestudy::get_casestudy_data('casestudy_cpt'))
<section class="casestudySection @field('layout_style')" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>

<div class="section-inner">

    @isfield('layout_style', 'slider')
    <div class="col-xs-12 col-lg">
        @hasfield('title')
        <h3>
            @field('title')
            </h3>
        @endfield
    </div>
    <div class="card-container casestudy_slider">

        @foreach ($casestudysData as $casestudy)
            <div class="casestudySlide">
                <div class="row">
                    <div class="col-xs-12 col-lg-5 casestudyCol pr-0">
                        <div class="box casestudyBox">
                            <div class="squareCon">
                                <img class="casestudyImage" src="{{ $casestudy['featured_image'] }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-7 pl-0">
                        <div class="box contentBox">
                            <div class="content_wrapper">
                                <div class="content">
                                @notempty($casestudy['logo'])
                                    <img class="logo" src="{{ $casestudy['logo'] }}" alt="">
                                @endnotempty
                                    <h3>{!! $casestudy['title'] !!}</h3>
                                    <p class="p-2">{!! $casestudy['body'] !!}</p>
                                </div>
                                @notempty($casestudy['cta'])
                                    <a href="{{ $casestudy['cta']['url'] }}" class="ctaBtnLink">
                                        <div class="ctaBtn">
                                            <div class="circle">
                                                <img
                                                    src="/app/themes/cmspi/resources/assets/images/arrow-right-medium-black.svg">
                                            </div>
                                            <span>{{ $casestudy['cta']['title'] }}</span>
                                        </div>
                                    </a>
                                @endnotempty
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="slide_control">
        <ul>
            <li class="prev">
                <button type='button' class='circle'><i class='long-arrow-left' aria-hidden='true'></i></button>
            </li>
            <li class="next">
                <button type='button' class='circle'><i class='long-arrow-right' aria-hidden='true'></i></button>
            </li>
        </ul>
    </div>
@endfield
@isfield('layout_style', 'three_in_row')
@set($casestudysData, array_slice($casestudysData, 0, 3))
<div class="col-xs-12 col-lg">
        @hasfield('title')
        <h3>
            @field('title')
            </h3>
        @endfield
    </div>
<div class="card-container">
    <div class="row">
        @foreach ($casestudysData as $casestudy)
            <div class="col-xs-12 col-lg-4">
                <div class="box">
                    <div class="box_body">
                        <div class="content">
                            <div class="imgWrapper">
                                <img class="top_image" src="{{ $casestudy['featured_image'] }}" alt="">
                                @notempty($casestudy['logo'])
                                    <div class="logoWrapper">
                                        <img class="logo" src="{{ $casestudy['logo'] }}" alt="">
                                    </div>
                                @endnotempty
                            </div>
                            <div class="textWrapper">
                                @notempty($casestudy['tags'])
                                    <div class="tags">{!! $casestudy['tags'] !!}</div>
                                @endnotempty
                                @notempty($casestudy['title'])
                                    <h4>{{ $casestudy['title'] }}</h4>
                                @endnotempty
                                @notempty($casestudy['body'])
                                    <p class="p-2">{{ $casestudy['body'] }}</p>
                                @endnotempty
                            </div>
                        </div>
                        @notempty($casestudy['cta'])
                            <div class="btnWrapper">
                                <a href="{{ $casestudy['cta']['url'] }}" class="btn--secondary-light small">
                                    {{ $casestudy['cta']['title'] }}
                                </a>
                            </div>
                        @endnotempty
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endfield
@isfield('layout_style', 'single')
<div class="section_top">
    <div class="row">
        <div class="col-xs-12 col-lg">
            @hasfield('title')
            <h3>
                @field('title')
                </h3>
            @endfield
        </div>
        <div class="col-xs-12 col-lg">
            @hasfield('description')
            <div class="description">
                @field('description')
                </div>
            @endfield
        </div>
    </div>
</div>
<div class="card-container">
    <div class="row">
        @set($casestudy, $casestudysData[0])
        <div class="col-xs-12 col-lg pr-0">
            <div class="imgWrapper">
                <img class="top_image" src="{{ $casestudy['featured_image'] }}" alt="">
                @notempty($casestudy['logo'])
                    <div class="logoWrapper">
                        <img class="logo" src="{{ $casestudy['logo'] }}" alt="">
                    </div>
                @endnotempty
            </div>
        </div>
        <div class="col-xs-12 col-lg pl-0">
            <div class="box">
                <div class="box_body">
                    <div class="content">
                        <div class="textWrapper">
                            @notempty($casestudy['tags'])
                                <div class="tags">{!! $casestudy['tags'] !!}</div>
                            @endnotempty
                            @notempty($casestudy['title'])
                                <h4>{{ $casestudy['title'] }}</h4>
                            @endnotempty
                            @notempty($casestudy['body'])
                                <p class="p-2">{{ $casestudy['body'] }}</p>
                            @endnotempty
                        </div>
                    </div>
                    @notempty($casestudy['cta'])
                        <div class="btnWrapper">
                            <a href="{{ $casestudy['cta']['url'] }}" class="btn--secondary-light large">
                                {{ $casestudy['cta']['title'] }}
                            </a>
                        </div>
                    @endnotempty
                </div>
            </div>
        </div>
    </div>

</div>

@endfield
@isfield('layout_style', 'carousel')
<div class="section_top">
    <div class="row">
        <div class="col-xs-12 col-lg">
            @hasfield('title')
            <h3>
                @field('title')
                </h3>
            @endfield
        </div>
        <div class="col-xs-12 col-lg">
            @hasfield('description')
            <div class="description">
                @field('description')
                </div>
            @endfield
        </div>
    </div>
</div>
<div class="card-container">
    <div class="casestudy_carousel">
        @foreach ($casestudysData as $casestudy)
            <div class="caseStudySlide">
                <div class="box">
                    <div class="box_body">
                        <div class="content">
                            <div class="imgWrapper">
                                <img class="top_image" src="{{ $casestudy['featured_image'] }}" alt="">
                                @notempty($casestudy['logo'])
                                    <div class="logoWrapper">
                                        <img class="logo" src="{{ $casestudy['logo'] }}" alt="">
                                    </div>
                                @endnotempty
                            </div>
                            <div class="textWrapper">
                                @notempty($casestudy['tags'])
                                    <div class="tags">{!! $casestudy['tags'] !!}</div>
                                @endnotempty
                                @notempty($casestudy['title'])
                                    <h4>{{ $casestudy['title'] }}</h4>
                                @endnotempty
                                @notempty($casestudy['body'])
                                    <p class="p-2">{{ $casestudy['body'] }}</p>
                                @endnotempty
                            </div>
                        </div>
                        @notempty($casestudy['cta'])
                            <div class="btnWrapper">
                                <a href="{{ $casestudy['cta']['url'] }}" class="btn--secondary-light small">
                                    {{ $casestudy['cta']['title'] }}
                                </a>
                            </div>
                        @endnotempty
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endfield
@isfield('layout_style', 'grid')
<div class="col-xs-12 col-lg">
        @hasfield('title')
        <h3>
            @field('title')
            </h3>
        @endfield
    </div>
<div class="card-container">
    <div class="row">
        @foreach ($casestudysData as $casestudy)
            @if ($casestudy['grid_class'] == 'full')
                <div class="col-xs-12 col-lg-6 {{ $casestudy['grid_class'] }} pr-0 gridCol">
                    <div class="imgWrapper">
                        <img class="top_image" src="{{ $casestudy['featured_image'] }}" alt="">
                        @notempty($casestudy['logo'])
                            <div class="logoWrapper">
                                <img class="logo" src="{{ $casestudy['logo'] }}" alt="">
                            </div>
                        @endnotempty
                    </div>
                </div>
            @endif
            <div
                class="col-xs-12 col-lg-6 {{ $casestudy['grid_class'] }} @if ($casestudy['grid_class'] == 'full') pl-0 @endif gridCol">
                <div class="box">
                    <div class="box_body">
                        <div class="content">
                            @if ($casestudy['grid_class'] == 'half')
                                <div class="imgWrapper">
                                    <img class="top_image" src="{{ $casestudy['featured_image'] }}"
                                        alt="">
                                    @notempty($casestudy['logo'])
                                        <div class="logoWrapper">
                                            <img class="logo" src="{{ $casestudy['logo'] }}" alt="">
                                        </div>
                                    @endnotempty
                                </div>
                            @endif
                            <div class="textWrapper">
                                @notempty($casestudy['tags'])
                                    <div class="tags">{!! $casestudy['tags'] !!}</div>
                                @endnotempty
                                @notempty($casestudy['title'])
                                    <h4>{{ $casestudy['title'] }}</h4>
                                @endnotempty
                                @notempty($casestudy['body'])
                                    <p class="p-2">{{ $casestudy['body'] }}</p>
                                @endnotempty
                            </div>
                        </div>
                        @notempty($casestudy['cta'])
                            <div class="btnWrapper">
                                <a href="{{ $casestudy['cta']['url'] }}" class="btn--secondary-light large">
                                    {{ $casestudy['cta']['title'] }}
                                </a>
                            </div>
                        @endnotempty
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endfield

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
