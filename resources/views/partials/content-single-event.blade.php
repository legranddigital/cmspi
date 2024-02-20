@php
    $event_date = get_field('event_date');
    $date = DateTime::createFromFormat('d/m/Y', $event_date);
    $today = strtotime('today');
    $e_date = strtotime($date->format('Y-m-d'));
    $day = $date->format('d');
    $month = $date->format('F');
    $year = $date->format('Y');
    $p_ids = get_field('people_cpt');
@endphp
<section class="singleEventSection @if ($today > $e_date) pastEvent @endif">
    <div class="section-inner">
        <div class="container">
            @if ($today > $e_date)
                <div class="btn--secondary small mr-1 event past basic">
                    Past event
                </div>
            @else
                <div class="btn--secondary small mr-1 event basic">
                    Upcoming
                </div>
            @endif
            <h2 class="title">{!! get_the_title() !!}</h2>

            <div class="row between-xs">
                <div class="col-xs-12 col-lg-6">
                    <div class="contentBox">
                        <p class="truncate">{!! get_the_excerpt() !!}</p>
                        <div class="bottomContent">
                            <div class="eventDetails">
                                <div class="dateWrapper">
                                    <p class="p-2 month">{{ $month }}</p>
                                    <h2 class="day">{{ $day }}</h2>
                                    <h5 class="year">{{ $year }}</h5>
                                </div>
                                <div class="registerEvent">
                                    <p class="p-0 time">@field('time')</p>
                                    <p class="p-2 location">@field('location')</p>
                                    @if ($today > $e_date)
                                        <a class="btn--primary large basic registerBtn">
                                            <span>This event is in the past</span>
                                        </a>
                                    @else
                                    @hasfield('target_page')
                                        <a href="@field('target_page', 'url')"
                                            class="btn--primary large basic registerBtn">
                                            <span>@field('target_page', 'title')</span>
                                        </a>
                                        @endfield
                                    @endif
                                </div>
                            </div>
                            @hasfield('event_video')
                            <div class="downloadWrapper">
                                <div>
                                    <p class="p-2"><strong>Download the recording </strong></p>
                                    <p class="p-3">@field('event_video', 'filename') </p>
                                </div>
                                <a href="@field('event_video', 'url')" class="btn--secondary small basic"
                                    download="@field('event_video', 'filename')
">Download <img
                                        src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/download.svg"></a>
                            </div>
                        @endfield
                        @if ($p_ids && $p_ids[0])
                            <h6>
                                @field('people_text')
                            </h6>
                            <div class="authorWrapper">
                                <div class="box">
                                    <div class="author-info">
                                        @if (has_post_thumbnail($p_ids[0]))
                                            <img src="{{ get_the_post_thumbnail_url($p_ids[0], 'full') }}"
                                                alt="Author Image" class="author-image">
                                        @endif
                                        <div class="author-details">
                                            @if (get_field('first_name', $p_ids[0]))
                                                <p class="p-2">{{ get_field('first_name', $p_ids[0]) }}
                                                    {{ get_field('last_name', $p_ids[0]) }}</p>
                                            @endif
                                            @if (get_field('position', $p_ids[0]))
                                                <p class="p-3">{!! get_field('position', $p_ids[0]) !!}</p>
                                            @endif
                                            <div class="wrapper">
                                                @if (get_field('email', $p_ids[0]))
                                                    <a class="btn--secondary small basic mr-1"
                                                        href="mailto:{{ get_field('email', $p_ids[0]) }}">
                                                        Get in touch
                                                    </a>
                                                @endif
                                                @if (get_field('linkedin_url', $p_ids[0]))
                                                    <a class="btn--secondary small linkedin basic"
                                                        href="{{ get_field('linkedin_url', $p_ids[0]) }}">
                                                        Connect
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
            <div class="col-xs-12 col-lg-6 pl-0 pr-0">
                @if (has_post_thumbnail())
                    <div class="eventImageWrapper">
                        <img class="eventImage" src="{{ get_the_post_thumbnail_url() }}" alt="">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</section>
{!! the_content() !!}
