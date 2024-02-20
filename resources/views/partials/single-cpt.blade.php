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
<div class="singlePageSection">
    <div class="section-inner">
        <div class="insightsDataRow">
            <div class="col-xs-12 col-lg-12 cardCol">
                <div class="box contentBox">
                    <div class="topInfo {{ $post_type }}">
                        <span class="category">{{ $obj->labels->name }}</span>
                        <span class="date">{{ get_the_date('F jS Y') }}</span>
                    </div>
                    <h2>{!! get_the_title() !!}</h2>
                    @if ($post_type === 'post' && has_post_thumbnail())
                        <img class="insightImage" src="{{ get_the_post_thumbnail_url() }}" alt="">
                    @endif
                    @hasfield('video_url')
                    <div class="videoBox @hasfield('autoplay') autoplay @endfield">
                            @hasfield('poster_image')
                                <div class="poster_image" style="background-image: url(@field('poster_image'))" data-src="@field('video_url')?loop=1&autopause=0{{ $iframeAttr }}"><img class="play" src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/play_button.svg"></div>
                            @endfield
                            @hasfield('autoplay')
                                <iframe src="@field('video_url')?loop=1&autopause=0{{ $iframeAttr }}"
                                allow="autoplay" frameborder="0"></iframe>
                            @endfield
                        </div>
                        @endfield
                    <div class="row between-xs">
                        <div class="col-xs-12 col-lg-6">
                            <p class="excerpt">{!! get_the_excerpt() !!}</p>
                        </div>
                        <div class="col-xs-12 col-lg-5">
                            @php
                                $p = get_field('people_cpt');
                                $p_id = isset(get_field('people_cpt')[0]) ? get_field('people_cpt')[0] : false;
                            @endphp
                            @if ($p_id)
                                <div class="box">
                                    <div class="author-info">
                                        @if (has_post_thumbnail($p_id))
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
                                                    <a class="btn--secondary small basic mr-1"
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! the_content() !!}
    </div>
</div>
