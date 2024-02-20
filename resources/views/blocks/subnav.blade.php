{{--
  Title: Subnav
  Description: Subnav Text
  Category: layout
  Icon: editor-alignleft
  Keywords: Subnav introduction text
  Mode: edit
  Align: left
  PostTypes: page post event video casestudy publication post people news
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

@hasfield('subnav')
<div class="sub_nav_con">
    <nav class="sub_nav container">
        <div class="subnav-dropdown">
            <div class="selected-subnav">
                <span class="selected">  
                    @hasoption('dropdown_subnav')
                        @option('dropdown_subnav')
                      @endoption
                </span> <span class="arrow down"></span>
            </div>
            <ul>
                @fields('subnav')
                    <li><a href="@sub('target_page', 'url')">@sub('target_page', 'title')</a></li>
                @endfields
            </ul>
        </div>
        <ul>
            <li class="rightAlignAuto">
                <a class="btn--secondary-light basic small shareBtn">
                    <span> 
                      @hasoption('share')
                        @option('share')
                      @endoption
                    </span>
                    <img src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/share_icon.svg">
                </a>
                <div class="sharePopup" style="display: none;">
                </div>
            </li>
        </ul>
    </nav>
</div>
@endfield
