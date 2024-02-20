@set($resultData, Casestudy::get_casestudy_listing())
@set($max_num_pages, $resultData['max_num_pages'])
@set($found_posts, $resultData['found_posts'])
@notempty($resultData['data'])
    <section class="casestudySection grid">
        <div class="section-inner">
            <div class="card-container">
                <div class="row">
                    @foreach ($resultData['data'] as $casestudy)
                    @if ($casestudy['grid_class'] == 'full')
                    <div class="col-xs-12 col-lg-6 {{$casestudy['grid_class']}} pr-0 gridCol">
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
                        <div class="col-xs-12 col-lg-6 {{$casestudy['grid_class']}} @if ($casestudy['grid_class'] == 'full') pl-0  @endif gridCol">
                            <div class="box">
                                <div class="box_body">
                                    <div class="content">
                                        @if ($casestudy['grid_class'] == 'half')
                                        <div class="imgWrapper">
                                            <img class="top_image" src="{{ $casestudy['featured_image'] }}" alt="">
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
                                                <h4>{!! $casestudy['title'] !!}</h4>
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
        </div>
        @set($custom_pagination, App\custom_pagination($max_num_pages, $found_posts))
        @notempty($custom_pagination)
            <div class="pagination">
            
                <div class="numbersWrapper">
                    @foreach (array_slice($custom_pagination, 1, -1) as $item)
                        {!! $item !!}
                    @endforeach
                </div>
           
            </div>
        @endnotempty
    </section>
@endnotempty