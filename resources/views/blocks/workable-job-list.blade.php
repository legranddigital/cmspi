{{--
  Title: WorkableJobList
  Description: WorkableJobList Text
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
<section class="workableJobListSection" @hasfield('scroll_id') id="@field('scroll_id')
" @endfield>
<div class="container">
    <div class="col-xs-12 col-md-12">
        @hasfield('title')
        <h3>
            @field('title')
            </h3>
        @endfield
       <!-- <script src='https://www.workable.com/assets/embed.js' type='text/javascript'></script>-->
        <script type='text/javascript' charset='utf-8'>
            whr(document).ready(function() {
                whr_embed(586020, {
                    detail: 'titles',
                    base: 'jobs',
                    zoom: 'country',
                    grouping: 'departments'
                });

                
            });
        </script>
        <div id="whr_embed_hook"></div>
    </div>
</div>
</section>
