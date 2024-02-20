{{--
  Title: Agenda
  Description: Agenda Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Agenda introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="agendaSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>

    <div class="section-inner">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <div class="box">
                        <h4>@field('title')</h4>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <div class="box contentBox">
                        @hasfield('agendas')
                        <div class="agenda">
                            @fields('agendas')
                            <div class="agenda_content">
                                <div class="top">
                                <p class="p-2">@sub('time')</p>
                                <p class="p-2">@sub('length')</p>
                                </div>
                                <div class="bottom_content">
                                    <p class="p-0">@sub('title')</p>
                                    <p class="p-2">@sub('description')</p>
                                </div>
                            </div>
                            @endfields
                        </div>
                        @endfield
                    </div>
                </div>
            </div>
    </div>
</section>
