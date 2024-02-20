{{--
  Title: banner
  Description: banner
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
<section class="bannerSection">
    @set($bannerData, banner::get_banner_data())

    <div class="section-inner">
        <div class="banner_carousel">
            @foreach ($bannerData as $item)
                <div class="carousel-item">
                    @notempty($item['image'])
                        <img class="desktop_image @notempty($item['mobile_image']) mobile_image_available @endnotempty" src="{{ $item['image'] }}" alt="">
                    @endnotempty
                    @notempty($item['mobile_image'])
                        <img class="mobile_image" src="{{ $item['mobile_image'] }}" alt="">
                    @endnotempty
                    <div class="carousel-overlay">
                        <div class="container">
                            <div class="content textWrapper">
                                <h4 class="title">{{ $item['title'] }}</h4>
                                <h1 class="title_large">{!! $item['title_large'] !!}</h1>
                                <p class="p-2">{!! $item['body'] !!}</p>
                            </div>
                            @if ($item['target_page'])
                                <a href="{{ $item['target_page']['url'] }}"
                                    class="btn--primary-light medium basic">{{ $item['target_page']['title'] }}</a>
                            @endif
                        </div>

                    </div>
                    @if (count($bannerData) > 1)
                        <div class="next-slide">
                            <img src="{{ $item['next_slide_image'] }}" alt="">
                            <div class="content">
                                <div class="progressBarTopContent">
                                    <div class="next_text">@hasoption('next')@option('next')@endoption</div>
                                    <h5 class="next_title">{!! $item['next_slide_title_large'] !!}</h5>
                                </div>
                                <div class="progressBarContainer">
                                    <span data-slick-index="{{ $item['index'] }}"
                                        data-nextslick-index="{{ $item['nextIndex'] }}" class="progressBar">
                                        <div class='inProgress inProgress{{ $item['index'] }}'></div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="slick-slider-dots container"></div>

    </div>
</section>
