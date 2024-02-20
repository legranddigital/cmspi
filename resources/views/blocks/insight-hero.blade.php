{{--
  Title: InsightHero
  Description: Insight hero Text
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

<section class="insightHeroSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($insightsData, Insight::get_insight_data('hero', 'insights', 'number_of_insights'))
    @php
	    $featuredInsightData = false;
	    if(isset($insightsData[0])){
	    	$featuredInsightData = $insightsData[0];
	    }
    @endphp
    @if($featuredInsightData)
    <div class="section-inner">
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
                    <a href="{{ $featuredInsightData['page_link'] }}" class="btn--secondary-light medium">Read
                        more</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
