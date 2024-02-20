<footer class="content-info">
    <div class="container">
        <div class="row main">
            <div class="col-xs-12 col-md-2 logo">
                <a class="brand" href="{{ home_url('/') }}">
                    <img src="@option('logo')" alt="{{ get_bloginfo('name', 'display') }}" />
                </a>
            </div>
            <div class="col-xs-12 col-md-6 menu">
                <div class="links">
                    @hasoptions('link_section')
                        @options('link_section')
                        <div class="col">
                            <h6>
                                @sub('title')
                              </h6>
                                <ul class="link_section">
                                    @hasoptions('links')
                                        @options('links')
                                        @hassub('target_link')
                                            <li>
                                                <a href="@sub('target_link', 'url')">
                                                  <p class="p-2">
                                                    @sub('target_link', 'title')
                                                  </p>
                                                </a>
                                            </li>
                                            @endsub
                                        @endoptions
                                    @endhasoptions
                                </ul>
                            </div>
                        @endoptions
                    @endhasoptions
                </div>
            </div>
            <div class="col-xs-12 col-md-4 forms">
                @hasoption('newsletter_title')
                <h6>
                    @option('newsletter_title')
                </h6>
                @endoption
                @hasoption('newsletter_title')
                <form action="@option('newsletter_form_link')" method="get">
                    <input name="email" type="email" id="email" placeholder="@option('placeholder_newsletter_form_input')"><br><br>
                    <input type="submit" value="@hasoption('submit')@option('submit')@endoption" class="btn--primary medium basic">
                </form>
                @endoption
                <div class="d-flex justify-content-end linkedin">
                    <a href="@option('linkedin_url')" class="btn--secondary small basic">
                        @option('linkedin_btn_text') 
                    </a>
            </div>
            </div>
        </div>
        <div class="row align-items-center copyright">
            <div class="col-xs-12 col-md-6">
                @hasoption('footer_copyright')
                <p class="p-2">
                  @option('footer_copyright')
                </p>
                @endoption
            </div>
            
         
        </div>

    </div>
</footer>
