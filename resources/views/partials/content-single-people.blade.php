<div class="half_bg_overlay">
    <section class="singlePeopleSection">
        <div class="section-inner">
            <div class="row center-xs gridRow">
            <div class="col-xs-12 col-md-1 gridCol">
            </div>
                <div class="col-xs-12 col-md-5 gridCol">
                    <div class="box gridBox">
                        @if (has_post_thumbnail())
                        <img class="gridImage" src="@thumbnail('full',false)" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 gridCol">
                    <div class="box contentBox">
                        <div class="content_wrapper">
                            <div class="content">
                                <h2>@field('first_name') @field('last_name')</h2>
                                <h4 class="position">@field('position'), @field('location')</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row peopleDetails">
                <div class="col-xs-12 col-md-3">
                    <p class="p-1">
                        <strong>
                        @field('expertise_title')
                        </strong>
                    </p>
                    <p class="p-2">
                        @field('expertise')
                    </p>
                </div>
                <div class="col-xs-12 col-md-6">
                <p class="p-1">
                        <strong>
                        @field('highlights_title')
                        </strong>
                <p>
                    <p class="p-2">
                        @field('highlights')
                </p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="alignRight">
                        <p class="p-1">
                                <strong>
                                @field('contact_title')
                            </strong>
                        </p>
                        <a class="btn--secondary small linkedin basic" href="@field('linkedin_url')">
                            <span class="btn_label">@hasoption('connect')@option('connect')@endoption</span>
                        </a>
                        <a class="btn--primary medium basic" href="mailto:@field('email')">@hasoption('get_in_touch')@option('get_in_touch')@endoption</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{!! the_content() !!}
