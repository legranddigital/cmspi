@php
    global $wp_query;
    $max_num_pages = $wp_query->max_num_pages;
    $found_posts = $wp_query->found_posts;
@endphp

@if (have_posts())
    <section class="resultPageSection">
        <div class="section-inner">
            <h3>Results for "{{ get_search_query() }}"</h3>
            <div>{{ $found_posts }} results</div>
            <div class="row insightsDataRow">
                @while (have_posts())
                    @php
                        the_post();
                        $post_type = get_post_type();
                        $obj = get_post_type_object($post_type);
                    @endphp
                    <div class="col-xs-12 cardCol">
                        <div class="box contentBox">
                            <div class="contentCard">
                                <div class="content">
                                    <div class="topInfo {{ $post_type }}">
                                        <p class="p-3"><strong>
                                                {{ $obj->labels->singular_name }}
                                            </strong>
                                        </p>
                                        <p class="p-3 date">{{ get_the_date('F jS Y') }}</p>
                                    </div>
                                    <p class="p-1"><strong>{!! get_the_title() !!}</strong></p>
                                    <p class="p-2">{!! get_the_excerpt() !!}</p>
                                </div>
                                <a href="{{ esc_url(get_permalink()) }}" class="btn--secondary medium">Read more</a>
                            </div>
                        </div>
                    </div>
                @endwhile
                @php
                    wp_reset_postdata();
                @endphp
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
@endif
