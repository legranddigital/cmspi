@set($resultData, Event::get_event_filter_result())
@set($action, $resultData['action'])
@set($max_num_pages, $resultData['max_num_pages'])
@set($found_posts, $resultData['found_posts'])
{{-- <pre>
    @php print_r($resultData) @endphp
    </pre> --}}
@notempty($resultData['data'])
    <section class="townhallGridSection townhallGridSection">
        <div class="section-inner">
            <div class="card-container">
                <div class="row">
                    @foreach ($resultData['data'] as $event)
                        <div class="col-xs-12 col-lg-4 cardCol">
                            <div class="box">
                                <div class="box_body">
                                    <div class="content">
                                        <div class="imgWrapper">
                                            <img class="top_image" src="{{ $event['featured_image'] }}" alt="">
                                            @notempty($event['date'])
                                                <div class="date">
                                                    <span>
                                                        <p class="p-3">{{ $event['date'] }}
                                                        </p>
                                                    </span>
                                                </div>
                                            @endnotempty
                                        </div>
                                        <div class="contentWrapper">
                                            @notempty($event['title'])
                                                <p><strong>{!! $event['title'] !!}</strong></p>
                                            @endnotempty
                                            <div class="bottomContent">
                                                <div class="termsWrapper">
                                                    @notempty($event['event_type'])
                                                        <div class="terms">
                                                            <img
                                                                src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/region_icon.svg">
                                                            <span class="p-3">{!! $event['event_type']['label'] !!}</span>
                                                        </div>
                                                    @endnotempty
                                                    @notempty($event['region_terms'])
                                                        <div class="terms">
                                                            <img
                                                                src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/region_icon.svg">

                                                            <p class="p-3">{{ $event['region_terms'] }}</p>
                                                        </div>
                                                    @endnotempty
                                                    @notempty($event['presence_terms'])
                                                        <div class="terms">
                                                            <img
                                                                src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/presence_icon.svg">
                                                            <p class="p-3">{!! $event['presence_terms'] !!}</p>
                                                        </div>
                                                    @endnotempty
                                                </div>
                                                @notempty($event['page_link'])
                                                    <div class="btnWrapper">
                                                        <a href="{{ $event['page_link'] }}"
                                                            class="btn--primary small arrow-cicle"></a>
                                                    </div>
                                                @endnotempty
                                            </div>
                                        </div>
                                    </div>

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
                <div class="nextPrevWrapper">
                    {!! reset($custom_pagination) !!}
                </div>
                <div class="numbersWrapper">
                    @foreach (array_slice($custom_pagination, 1, -1) as $item)
                        {!! $item !!}
                    @endforeach
                </div>
                <div class="nextPrevWrapper">
                    {!! end($custom_pagination) !!}
                </div>
            </div>
        @endnotempty

    </section>
@endnotempty
