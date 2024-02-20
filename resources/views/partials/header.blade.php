<header class="mainHeader">
    @set($menuList, App\get_menu_array('header'))
    <div class="header_con container">
        <div class="header-left">
            <div class="logo">
                <a href="{{ home_url('/') }}"><img src="@option('logo')"
                        alt="{{ get_bloginfo('name', 'display') }}" /></a>
            </div>
            @if ($menuList)
                <nav class="menu">
                    <ul>
                        @foreach ($menuList as $m)
                            @php
                                $children1 = $m['children'];
                                $mId = $m['ID'];
                                $mUrl = $m['url'];
                                $mTitle = $m['title'];
                                $current = $m['current'];
                                $hide_on_desktop = get_field('hide_on_desktop', $mId);
                                $hide_on_mobile = get_field('hide_on_mobile', $mId);
                            @endphp
                            @if (!$children1)
                                <li
                                    class="@if ($hide_on_desktop) hide_on_desktop @endif @if ($hide_on_mobile) hide_on_mobile @endif">
                                    <a href="{!! $mUrl !!}" class="menu-link">{!! $mTitle !!}</a></li>
                            @else
                                <li
                                    class="has-submenu @if ($hide_on_desktop) hide_on_desktop @endif @if ($hide_on_mobile) hide_on_mobile @endif">
                                    <a href="#" class="menu-link">{!! $mTitle !!} <span
                                            class="arrow down"></span></a>
                                    <div class="mega-submenu">
                                        <div class="mega-submenu-inner">
                                            <div class="tabs-container container">
                                                <div class="tabs">
                                                    @foreach ($children1 as $child)
                                                        @php
                                                            $childId = $child['ID'];
                                                            $childTitle = $child['title'];
                                                            $childUrl = $child['url'];
                                                            $current = $child['current'];
                                                            $classes = $child['classes'];
                                                            $is_bold = get_field('is_bold', $childId);
                                                        @endphp
                                                        <a href="{{ $childUrl }}"
                                                            class="tab {!! $classes !!} @if ($is_bold) strong @endif">{!! $childTitle !!}</a>
                                                    @endforeach
                                                </div>
                                                <div class="tab-content">
                                                    @foreach ($children1 as $child)
                                                        @php
                                                            $childId = $child['ID'];
                                                            $childTitle = $child['title'];
                                                            $current = $child['current'];
                                                            $childImg = get_field('title', $childId);
                                                            $childExcerpt = get_field('excerpt', $childId);
                                                        @endphp
                                                        <div class="content">
                                                            <h5>{!! $childTitle !!}</h5>
                                                            <div>{!! $childExcerpt !!}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            @endif
        </div>
        <div class="header-right">
            <div class="countries dropdown">
                <img class="countries_img" src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/countries.svg">
                <img class="countries_img_blue" src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/countries_blue.svg">
                @hasoptions('countries')
                    <button class="dropdown-toggle">
                    @hasoption('select_country_dropdown')
                      @option('select_country_dropdown')
                     @endoption
                </button>
                    <ul class="dropdown-menu">
                        @options('countries')
                            <li>
                                @hassub('continent')
                                <div class="continent">
                                    <a href="@sub('continent', 'url')">
                                        @sub('continent', 'title')
                                        </a>
                                    </div>
                                @endsub
                                @hassub('countries_list')
                                @foreach (get_sub_field('countries_list') as $country)
                                    {{-- @php print_r($country); @endphp --}}
                                    @if ($country['country'])
                                        <div class="countries_list">
                                            <a href="{{ $country['country']['url'] }}">{!! $country['country']['title'] !!}</a>
                                        </div>
                                    @endif
                                @endforeach
                            @endsub
                        </li>
                    @endoptions
                </ul>
            @endhasoptions
        </div>
        <div class="search">
            <img class="searchIcon" src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/search.svg">
            <img class="searchIconBlue" src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/search_blue.svg">
            <div class="searchInputWrapper">
                <div class="container">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="searchMain">
                            <button type="submit" class="search-submit"><img
                                    src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/search.svg"></button>
                            <input type="text" placeholder="@hasoption('search')@option('search')@endoption" class="searchInput"
                                value="@php echo get_search_query(); @endphp" name="s" />
                            <svg class="closeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="24px" height="24px">
                                <path d="M11 0.7H13V23.3H11z" transform="rotate(-45.001 12 12)" />
                                <path d="M0.7 11H23.3V13H0.7z" transform="rotate(-45.001 12 12)" />
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @hasoptions('contact_button_link')
            <a href="@option('contact_button_link', 'url')" class="btn--primary basic medium">@option('contact_button_link', 'title')</a>
        @endhasoptions
    </div>
    <div class="navbar_toggler">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</div>

<div class="header_con_M">
    <div class="header_top_M">
        <div class="countries dropdown">
            <img src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/countries.svg">
            @hasoptions('countries')
                <button class="dropdown-toggle">
                @hasoption('select_country_dropdown')
                      @option('select_country_dropdown')
                @endoption
                </button>
                <ul class="dropdown-menu">
                    @options('countries')
                        <li>
                            @hassub('continent')
                            <div class="continent">
                                <a href="@sub('continent', 'url')">
                                    @sub('continent', 'title')
                                    </a>
                                </div>
                            @endsub
                            @hassub('countries_list')
                            @foreach (get_sub_field('countries_list') as $country)
                                {{-- @php print_r($country); @endphp --}}
                                @if ($country['country'])
                                    <div class="countries_list">
                                        <a href="{{ $country['country']['url'] }}">{!! $country['country']['title'] !!}</a>
                                    </div>
                                @endif
                            @endforeach
                        @endsub
                    </li>
                @endoptions
            </ul>
        @endhasoptions
    </div>
    <div class="search">
        <div class="searchInputWrapper">
            <div class="container">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="searchMain">
                        <img class="searchIcon" src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/search.svg">
                        <button type="submit" class="search-submit"><img
                                src="<?php echo get_theme_file_uri(); ?>/resources/assets/images/search.svg"></button>
                        <input type="text" placeholder="@hasoption('search')@option('search')@endoption" class="searchInput"
                            value="@php echo get_search_query(); @endphp" name="s" />
                        <svg class="closeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            width="24px" height="24px">
                            <path d="M11 0.7H13V23.3H11z" transform="rotate(-45.001 12 12)" />
                            <path d="M0.7 11H23.3V13H0.7z" transform="rotate(-45.001 12 12)" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($menuList)
    <nav class="menu">
        <ul>
            @foreach ($menuList as $m)
                @php
                    $children1 = $m['children'];
                    $mId = $m['ID'];
                    $mUrl = $m['url'];
                    $mTitle = $m['title'];
                    $current = $m['current'];
                    $hide_on_desktop = get_field('hide_on_desktop', $mId);
                    $hide_on_mobile = get_field('hide_on_mobile', $mId);
                @endphp
                @if (!$children1)
                    <li
                        class="@if ($hide_on_desktop) hide_on_desktop @endif @if ($hide_on_mobile) hide_on_mobile @endif">
                        <a href="{!! $mUrl !!}" class="menu-link">{!! $mTitle !!}</a></li>
                @else
                    <li
                        class="has-submenu @if ($hide_on_desktop) hide_on_desktop @endif @if ($hide_on_mobile) hide_on_mobile @endif">
                        <a href="#" class="menu-link">{!! $mTitle !!} <span
                                class="arrow right"></span></a>
                        <div class="mega-submenu megaMenuCon_M">
                            <a href="javascript:void(0);"
                                class="backBtn megaMenuBack_M btn--secondary basic small">Back</a>
                            <div class="tabs-container">
                                <div class="tabs">
                                    @foreach ($children1 as $child)
                                        @php
                                            $childId = $child['ID'];
                                            $childTitle = $child['title'];
                                            $childUrl = $child['url'];
                                            $current = $child['current'];
                                            $is_bold = get_field('is_bold', $childId);
                                        @endphp
                                        <a href="{!! $childUrl !!}" class="tab @if ($is_bold) strong @endif">{!! $childTitle !!}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
@endif
</div>
</header>
