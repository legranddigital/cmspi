@php
    $categories = get_the_category();
    $cat = '';
    if (!empty($categories)) {
        $cat = esc_html($categories[0]->name);
    }
    $post_type = get_post_type();
    $obj = get_post_type_object($post_type);
@endphp

<div class="half_bg_overlay">
<section class="singleCasestudySection">
    <div class="section-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="topInfo {{ $post_type }}">
                        <p class="p-3">
                            <strong>
                                Case Studies
                            </strong>
                        </p>
                    </div>
                    <h1>{!! get_the_title() !!}</h1>
                    <div class="row singleRow">
                        <div class="col-xs-12 col-lg-6">
                            <p class="p-1">{!! get_the_excerpt() !!}</p1>
                        </div>
                        <div class="col-xs-12 col-md-offset-4 col-lg-2">
                            @hasfield('logo')
                            <img class="logoImage" src="@field('logo')" alt="">
                        @endfield
                    </div>
                </div>
                @if (has_post_thumbnail())
                    <img class="casestudyImage" src="@thumbnail('full', false)" alt="">
                @endif
                <div class="row peopleDetails">
                <div class="col-xs-12 col-md-6">
                    <p class="p-1">
                        <strong>
                        @field('intro_title')
                        </strong>
                    </p>
                    <p class="p-2">
                        @field('intro')
                    </p>
                </div>
                <div class="col-xs-12 col-md-6">
                <p class="p-1">
                        <strong>
                        @field('key_achievements_title')
                        </strong>
                <p>
                    <p class="p-2">
                        @field('key_achievements')
                </p>
                </div>
        
            </div>
            
</div>
            </div>
        </div>
    </div>


</section>
</div>

{!! the_content() !!}
