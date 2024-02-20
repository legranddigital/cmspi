{{--
    Title: TownhallEvents
    Description: TownhallEvents Text
    Category: layout
    Icon: editor-alignleft
    Keywords: TownhallEvents introduction text
    Mode: edit
    Align: left
    PostTypes: page post event video casestudy publication post people news
    SupportsAlign: left right
    SupportsMode: false
    SupportsMultiple: true
  --}}
  
  @set($nextTownHallEvents, Event::getNextTownhallEvents())
  @set($pastTownHallEvents, Event::getPastTownhallEvents())
  <section class="townhallEventsSection" @hasfield('scroll_id') id="@field('scroll_id')" @endfield>
  
      <div class="section-inner">
  
          <h3>@field('title')</h3>
          <p class="p-2">@field('next_townhall_title_one')</p>
  
          <p class="p-0">@field('next_townhall_title')</p>
          <div class="card-container">
              <div class="row">
                  @foreach ($nextTownHallEvents as $event)
                      <div class="col-xs-12 {{ $event['grid_class'] }} gridCol">
                          <div class="box">
                              <div class="box_body">
                                  <div class="content h-100">
                                      <div class="imgWrapper">
                                          @if ($event['grid_class'] == 'first')
                                              <img class="top_image" src="{{ $event['featured_image'] }}" alt="">
                                          @endif
                                          @notempty($event['date'])
                                              <div class="date">
                                                  <span>
                                                      <p class="p-3">{{ $event['date'] }}
                                                      </p>
                                                  </span>
                                              </div>
                                          @endnotempty
                                      </div>
                                      <div class="contentWrapper">
                                          <div class="topContent">
                                              @notempty($event['name'])
                                                  <p class="p-0">
                                                      <strong>
                                                          {!! $event['name'] !!}
                                                      </strong>
                                                  </p>
                                              @endnotempty
                                              @notempty($event['short_description'])
                                                  <p class="p-2 truncate">{!! $event['short_description'] !!}</p>
                                              @endnotempty
                                          </div>
                                          <div class="bottomContent">
                                              <div class="leftContent">
                                                  <div class="termField d-flex align-items-center">
                                                      <img
                                                          src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/presence_icon.svg">
                                                      <span class="p-3">{{ $event['event_type']['label'] }}</span>
                                                  </div>
                                                  <div class="termsWrapper termField">
                                                      @notempty($event['region_terms'])
                                                          <div class="d-flex align-items-center">
                                                              <img
                                                                  src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/region_icon.svg">
  
                                                              <span class="p-3">{{ $event['region_terms'] }}</span>
                                                          </div>
                                                      @endnotempty
                                                  </div>
                                              </div>
                                              <div class="btnWrapper">
                                                  @if ($event['grid_class'] == 'first')
                                                      <a href="{{ $event['target_page']['url'] }}"
                                                          class="btn--secondary-light small basic">Request details</a>
                                                  @else
                                                      <a href="{{ $event['target_page']['url'] }}" class="btn--secondary small basic">Request details</a>
                                                  @endif
                                                  @notempty($event['page_link'])
                                                      <a href="{{ $event['page_link'] }}"
                                                          class="btn--primary-light small arrow-cicle"></a>
                                                  @endnotempty
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>
  
      @hasfield('townhall_form_submit_link')
      <div class="form-container">
          @hasfield('form_title')
              <h4>@field('form_title')</h4>
          @endfield
          @hasfield('form_description')
          <p class="p-2">@field('form_description')</p>
          @endfield
          <form action="@field('townhall_form_submit_link')" method="get">
              <div class="form-group">
                  <div class="icon">
                      <img src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/user.svg">
                  </div>
                  <input type="text" name="name" placeholder="Name">
              </div>
              <div class="form-group">
                  <div class="icon">
                      <img src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/briefcase-alt.svg">
                  </div>
                  <input type="text" name="company" placeholder="Company">
              </div>
              <div class="form-group">
                  <div class="icon">
                      <img src="@php echo get_theme_file_uri(); @endphp/resources/assets/images/envelope.svg">
                  </div>
                  <input type="email" name="email" placeholder="Email address">
                  <label for="email"></label>
              </div>
              <input type="submit" class="btn--primary medium basic form" value="@field('form_submit_copy')" />
  
          </form>
      </div>
      @endfield 
  
      <div class="section-inner">
          <p class="p-0">@field('past_townhall_title')</p>
          <div class="card-container">
              <div class="row">
                  @foreach ($pastTownHallEvents as $event)
                      <div class="col-xs-12 rest gridCol">
                          <div class="box">
                              <div class="box_body">
                                  <div class="content h-100">
                                      <div class="imgWrapper">
                                          @notempty($event['date'])
                                              <div class="date">
                                                  <span>
                                                      <p class="p-3">{{ $event['date'] }}
                                                      </p>
                                                  </span>
                                              </div>
                                          @endnotempty
                                      </div>
                                      <div class="contentWrapper">
                                          <div class="topContent">
                                              @notempty($event['name'])
                                                  <p class="p-1"><strong>{!! $event['name'] !!}</strong></h4>
                                              @endnotempty
                                              @notempty($event['short_description'])
                                                  <p class="p-2 truncate">{!! $event['short_description'] !!}</p>
                                              @endnotempty
                                          </div>
                                          <div class="bottomContent">
                                              <div class="leftContent">
                                                  <div class="termField d-flex align-items-center">
                                                      <img
                                                          src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/presence_icon.svg">
                                                      <span class="p-3">{!! $event['event_type']['label'] !!}</span>
                                                  </div>
                                                  <div class="termsWrapper termField">
                                                      @notempty($event['region_terms'])
                                                          <div class="d-flex align-items-center">
                                                              <img
                                                                  src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/region_icon.svg">
  
                                                              <span class="p-3">{{ $event['region_terms'] }}</span>
                                                          </div>
                                                      @endnotempty
                                                  </div>
                                              </div>
                                              <div class="btnWrapper">
                                                  <a href="{{ $event['target_page']['url'] }}" class="btn--secondary small basic">Request details</a>
                                                  @notempty($event['page_link'])
                                                      <a href="{{ $event['page_link'] }}"
                                                          class="btn--primary-light small arrow-cicle"></a>
                                                  @endnotempty
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
          @hasfield('target_page')
          <div class="row center-xs">
              <div class="col-12">
                  <a href="@field('target_page', 'url')" class="btn--secondary basic medium">
                  @field('target_page', 'title')
                      </a>
                  </div>
              </div>
          @endfield
      </div>
  
  </section>
  