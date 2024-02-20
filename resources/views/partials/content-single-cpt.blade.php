@php
    $categories = get_the_category();
    $cat = '';
    if (!empty($categories)) {
        $cat = esc_html($categories[0]->name);
    }
    $post_type = get_post_type();
    $obj = get_post_type_object($post_type);
@endphp
@set($iframeAttr, '&autoplay=1&background=1')
<section class="resultPageSection">
    <div class="section-inner">
        <div class="row insightsDataRow">
            <div class="col-xs-12 col-lg-12 cardCol">
              @if (get_the_post_thumbnail_url('full'))
              <img class="insightImage" src="{{ get_the_post_thumbnail_url('full') }}" alt="">
              @endif
              @if (get_field('video_url'))
              <iframe src="{{get_field('video_url')}}?loop=1&autopause=0{{ $iframeAttr }}"
              allow="autoplay" frameborder="0"></iframe>
              @endif
                <div class="box contentBox">
                    <div class="contentCard">
                        <div class="content">
                            <div class="topInfo {{ $post_type }}">
                                <span class="category">{{ $obj->labels->name }}</span>
                                <span class="date">{{ get_the_date('F jS Y') }}</span>
                            </div>
                            <h4 class="title">{!! get_the_title() !!}</h4>
                            <div class="row insightsDataRow">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="body">{!! get_the_excerpt() !!}</div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    @php
                                        $p_id = get_field('people_cpt')[0];
                                    @endphp
                                    @if($p_id)
                                    <div class="box">
                                        <div class="contentCard">
                                            <div class="author-info">
                                                @if (get_the_post_thumbnail_url($p_id, 'full'))
                                                    <img src="{{ get_the_post_thumbnail_url($p_id, 'full') }}"
                                                        alt="Author Image" class="author-image">
                                                @endif
                                                <div class="author-details">
                                                    @if (get_field('first_name', $p_id))
                                                        <p class="p-2">{{ get_field('first_name', $p_id) }}
                                                            {{ get_field('last_name', $p_id) }}</p>
                                                    @endif
                                                    @if (get_field('position', $p_id))
                                                        <p class="p-3">{!! get_field('position', $p_id) !!}</p>
                                                    @endif
                                                    <div class="wrapper">
                                                        @if (get_field('email', $p_id))
                                                            <a class="btn--secondary small basic"
                                                                href="mailto:{{ get_field('email', $p_id) }}">@hasoption('get_in_touch')@option('get_in_touch')@endoption</a>
                                                        @endif
                                                        @if (get_field('linkedin_url', $p_id))
                                                            <a class="btn--secondary small linkedin basic"
                                                                href="{{ get_field('linkedin_url', $p_id) }}">
                                                                @hasoption('connect')@option('connect')@endoption
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{!! the_content() !!}

