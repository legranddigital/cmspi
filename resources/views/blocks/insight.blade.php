{{--
  Title: Insight
  Description: Insight Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Insight introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="insightSection" @hasfield('scroll_id') id="@field('scroll_id')
" @endfield>
@set($insightsData, Insight::get_insight_data('insights_display', 'insights', 'number_of_insights'))
@php
    $featuredInsightData = false;
    $is_it_grid = get_field('is_it_grid');
    if (isset($insightsData[0]) && (empty($is_it_grid) || $is_it_grid === false)) {
        $featuredInsightData = $insightsData[0];
    }
@endphp

<div class="section-inner">
    @hasfield('title')
    <h3>
        @field('title')
        </h3>
    @endfield
    @if ($featuredInsightData)
        <div class="row insightRow">
            <div class="col-xs-12 col-md-6 insightCol">
                <div class="box insightBox">
                    <img class="insightImage" src="{{ $featuredInsightData['featured_image'] }}" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-md-6 insightCol">
                <div class="box contentBox floatingBox">
                    <div class="content_wrapper">
                        <div class="content">
                            <div class="topInfo {{ $featuredInsightData['post_type'] }}">
                                <span class="category">{{ $featuredInsightData['post_type_name'] }}</span>
                                <span class="date">{{ $featuredInsightData['date'] }}</span>
                            </div>
                            <h4 class="title">{!! $featuredInsightData['title'] !!}</h4>
                            <div class="body">{!! $featuredInsightData['body'] !!}</div>
                        </div>
                        <a href="{{ $featuredInsightData['page_link'] }}" class="btn--secondary medium">Read
                            more</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($insightsData)
        @php
            $startGridWith = 1;
            if ($is_it_grid) {
                $startGridWith = 0;
            }
        @endphp
        <div class="card-container">
            <div class="row insightsDataRow">
                @foreach (array_slice($insightsData, $startGridWith, 3) as $insight)
                    <div class="col-xs-12 col-lg-4 cardCol">
                        <div class="box contentBox">
                            <div class="contentCard">
                                <div class="content">
                                    <div class="topInfo {{ $insight['post_type'] }}">
                                        <span class="category">{!! $insight['post_type_name'] !!}</span>
                                        <span class="date">{{ $insight['date'] }}</span>
                                    </div>
                                    <p><strong>{!! $insight['title'] !!}</strong></p>
                                    <p class="p-2">{!! $insight['body'] !!}</p>
                                </div>
                                <a href="{{ $insight['page_link'] }}" class="btn--secondary medium">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @hasfield('load_more')
            @set($loadMoreData, array_slice($insightsData, ($startGridWith + 3)))
            @js('insightLoadMoreData', $loadMoreData)
            @if (count($insightsData) > 4)
                <div class="loadMoreBtnWrapper">
                    <a href="javascript:void(0);" class="btn--secondary basic medium loadMoreBtn">Load more</a>
                </div>
            @endif
            @endfield
        </div>
    @endif
</div>
</section>
