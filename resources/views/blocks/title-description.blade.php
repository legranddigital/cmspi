{{--
  Title: Title and description
  Description: title description
  Category: layout
  Icon: editor-alignleft
  Keywords: intro introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}
<section class="title-description" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="row">
          <div class="col-xs-12 col-md-8 start-xs @isfield('block_alignement', 'center') m-auto @endfield">

            @hasfield('tag')
              <h5>@field('tag')</h5>
            @endfield

            @hasfield('title')
            <h1>@field('title')</h1>
            @endfield

            @hasfield('sub_title')
            <h2>@field('sub_title')</h2>
            @endfield

            @hasfield('sub_title_h3')
            <h3>@field('sub_title_h3')</h3>
            @endfield

            @hasfield('sub_title_h4')
            <h4>@field('sub_title_h4')</h4>
            @endfield
            
            @hasfield('body_copy')
            <p>@field('body_copy')</p>
            @endfield

            @hasfield('target_page')
            <a href="@field('target_page','url')" class="btn--secondary large basic">
            @field('target_page','title')
            </a>
            @endfield

        </div>
    </div>
</section>
