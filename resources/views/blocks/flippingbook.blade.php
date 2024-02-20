{{--
  Title: Flippingbook
  Description: Flippingbook Text
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
<section class="flippingbook" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    <div class="container">
        <div class="col-xs-12 col-md-12">
            @hasfield('embed_code')
                @field('embed_code')
            @endfield
        </div>
    </div>
</section>