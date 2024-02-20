{{--
  Title: Testimonial
  Description: Testimonial Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Testimonial introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="testimonialSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($testimonialsData, Testimonial::get_testimonial_data('testimonial_cpt_carousel'))

    <div class="section-inner">
        <div class="card-container centerMode testimonial_full_carousel">
            @foreach ($testimonialsData as $testimonial)
                <div class="card testimonial-card">
                    <div class="testimonial-content">
                    <img class="logo" src="{{ $testimonial['featured_image'] }}" alt="">
                        <p class="">
                            {!! $testimonial['content'] !!}
                        </p>


                        @notempty($testimonial['author'])
                        <div class="author-info">
                        @notempty($testimonial['author_avatar'])
                            <img src="{{ $testimonial['author_avatar'] }}" alt="Author Image" class="author-image">
                        @endnotempty
                        <div class="author-details">
                            <p class="p-2">{{ $testimonial['author'] }}</p>
                            <p class="p-3">{!! $testimonial['author_job_title'] !!}</p>
                            <div class="wrapper">
                                @notempty($testimonial['get_in_touch'])
                                <a class="btn--secondary small basic" href="{{ $testimonial['get_in_touch']['url'] }}">
                                    {{ $testimonial['get_in_touch']['title'] }}
                                </a>
                                @endnotempty
                                @notempty($testimonial['linkedin_link'])
                                <a class="btn--secondary small basic linkedin" href="{{ $testimonial['linkedin_link']['url'] }}">
                                    {{ $testimonial['linkedin_link']['title'] }}
                                </a>
                                @endnotempty
        
                            </div>
                        </div>
                    </div> 
                    @endnotempty

                    </div>
                </div>
            @endforeach
        </div>
        <div class="slide_control">
            <ul>
                <li class="prev">
                    <button type='button' class='circle'><i class='long-arrow-left' aria-hidden='true'></i></button>
                </li>
                <li class="next">
                    <button type='button' class='circle'><i class='long-arrow-right' aria-hidden='true'></i></button>
                </li>
            </ul>
        </div>
</section>
