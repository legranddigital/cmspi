{{--
  Title: InsightColumns
  Description: Insight Columns Text
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

<section class="insightColumnsSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($insightsData, Insight::get_insight_data('insights_display', 'insights', 'number_of_insights'))
    @php
	    $featuredInsightData = false;
	    if(isset($insightsData[0])){
	    	$featuredInsightData = $insightsData[0];
	    }
    @endphp
    <div class="section-inner">

    	@hasfield('title')
            <h3>
               @field('title')
            </h3>
        @endfield

        <div class="row insightRow">
	    @if($featuredInsightData)
            <div class="col-xs-12 col-md-6 insightCol leftCol">
                <div class="box insightBox">
                    <img class="insightImage" src="{{ $featuredInsightData['featured_image'] }}" alt="">
                    <div class="contentBox">
                        <div class="content_wrapper">
                            <div class="content">
                                <div class="topInfo {{ $featuredInsightData['post_type'] }}">
                                    <span class="category">{{ $featuredInsightData['post_type_name'] }}</span>
                                    <span class="date">{{ $featuredInsightData['date'] }}</span>
                                </div>
                                <h4>{!! $featuredInsightData['title'] !!}</h4>
                                <p class="p-2">{!! $featuredInsightData['body'] !!}</p>
                            </div>
                            <a href="{{ $featuredInsightData['page_link'] }}" class="btn--secondary medium">Read
                                more</a>
                        </div>
                    </div>
                </div>
            </div>
	    @endif
	    @if($insightsData)
            <div class="col-xs-12 col-md-6 insightCol rightCOl">
                <div class="box contentBox">
                    <div class="contentCard">
                        @foreach (array_slice($insightsData, 1) as $insight)
                            <div class="content">
                                <div class="topInfo {{ $insight['post_type'] }}">
                                    <span class="category">{!! $insight['post_type_name'] !!}</span>
                                    <span class="date">{{ $insight['date'] }}</span>
                                </div>
                                <a href="{{ $insight['page_link'] }}">{!! $insight['title'] !!}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
	    @endif
        </div>
    </div>
</section>
