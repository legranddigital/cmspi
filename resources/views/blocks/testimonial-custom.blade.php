{{--
  Title: Testimonial Custom
  Description: Testimonial Custom Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Testimonial Custom introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="testimonialCustomSection @hasfield('author_avatar') author_wrapper @endfield" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>

    <div class="section-inner">
        <div class="row testimonialCustomRow  ">
            <div class="col-xs-12 col-md-5 testimonialCustomCol">
                <div class="box contentBox">
                    <div class="content_wrapper">
                        <div class="content">
                            <p class="p-0">@field('content')</p>
                            <p class="p-2">
                                <strong>
                                @field('author_full_name')
                            </strong>
                            </p>
                            <div class="author_details">
                                <p class="p-3">@field('author_job_title'), @field('company')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-7 testimonialCustomCol">
                <div class="box testimonialCustomBox">
                    <img class="author_avatar" src="@field('author_avatar')" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
