@set($resultData, Insight::get_filter_result())
@set($action, $resultData['action'])
@set($max_num_pages, $resultData['max_num_pages'])
@set($found_posts, $resultData['found_posts'])
@notempty($resultData['data'])
    <section class="resultPageSection">
        <div class="section-inner">
            <div class="row insightsDataRow">
                @foreach ($resultData['data'] as $item)
                    <div class="col-xs-12 col-lg-4 cardCol">
                        <div class="box contentBox">
                            <div class="contentCard">
                                <div class="content">
                                    <div class="topInfo {{ $item['post_type'] }}">
                                        <p class="p-3"><strong>
                                                {!! $item['post_type_name'] !!}
                                            </strong>
                                        </p>
                                        <p class="p-3 date">{{ $item['date'] }}</p>
                                    </div>
                                    <p class="p-1"><strong>{!! $item['title'] !!}</strong></p>
                                    <p class="p-2">{!! $item['body'] !!}</p>
                                </div>
                                <a href="{{ $item['page_link'] }}" class="btn--secondary medium">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @set($custom_pagination, App\custom_pagination($max_num_pages, $found_posts))
        @notempty($custom_pagination)
            <div class="pagination">
                <div class="prevWrapper">
                    {!! reset($custom_pagination) !!}
                </div>
                <div class="numbersWrapper">
                    @foreach (array_slice($custom_pagination, 1, -1) as $item)
                        {!! $item !!}
                    @endforeach
                </div>
                <div class="prevWrapper">
                    {!! end($custom_pagination) !!}
                </div>
            </div>
        @endnotempty
    </section>
@endnotempty
