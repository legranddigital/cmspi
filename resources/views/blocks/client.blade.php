{{--
  Title: Client Carousel
  Description: Client Carousel
  Category: layout
  Icon: editor-alignleft
  Keywords: Client introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="clientSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
    @set($clientsData, Client::get_client_data('client_cpt'))

    <div class="section-inner">
    @hasfield('title')
            <p class="p-0">
                @field('title')
            </p>
        @endfield 
        <div class="card-container client_carousel">
              
        @foreach ($clientsData as $client)
                <div class="card">
                    <img src="{{ $client['image'] }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</section>
