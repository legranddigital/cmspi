/* global insightLoadMoreData */
/* global Vimeo */
// import external dependencies
import 'jquery';
import 'slick-carousel';

// Load Events
jQuery(document).ready(function () {

    var $mainHeader = $('.mainHeader');
    var $header_con = $('.header_con');
    var $header_con_M = $('.header_con_M');
    var $search = $('.search', $header_con);

    $mainHeader.on('click', '.navbar_toggler', function () {
        $('html, body').toggleClass('o-h');
        $('body').toggleClass('mobile_menu_open');
    });

    $header_con.on({
        mouseenter: onMenuItemMouseEnter,
    }, '.menu-link');
    $header_con.on({
        mouseenter: onMenuTabMouseEnter,
    }, '.tab');
    $header_con.on({
        mouseleave: onNavMenuMouseLeave,
    }, 'nav.menu');
    $header_con.on({
        mouseenter: onMegaMenuMouseEnter,
        mouseleave: onMegaMenuMouseLeave,
    }, '.has-submenu .mega-submenu');

    $header_con_M.on('click', '.has-submenu .menu-link', function (e) {
        e.preventDefault();
        var $thisMegaMenu = $(this).addClass('current').next('.megaMenuCon_M');
        $thisMegaMenu.addClass('slideIn').removeClass('slideOut');
    });

    $header_con_M.on('click', '.megaMenuBack_M', function (e) {
        e.preventDefault();
        $('.has-submenu .menu-link').removeClass('current');
        $(this).closest('.megaMenuCon_M').removeClass('slideIn').addClass('slideOut');
    });

    $header_con.on('click', '.searchIcon', function () {
        $search.addClass('open');
    }).on('click', '.closeIcon', function () {
        $search.removeClass('open');
    });
    $header_con_M.on('click', '.searchIcon', function () {
        $header_con_M.addClass('search_open');
    }).on('click', '.closeIcon', function () {
        $header_con_M.removeClass('search_open');
    });

    var $doc = $(document);
    var $body = $('body');

    function closeDropdown() {
        $('.dropdown-menu', $mainHeader).removeClass('active');
        $body.removeClass('country_dropdown_open');
    }

    $mainHeader.on('click', '.dropdown-toggle', function () {
        var $countries = $(this).closest('.countries');
        $('.dropdown-menu', $countries).toggleClass('active');
        $body.toggleClass('country_dropdown_open');
    });
    $doc.on('click', function (event) {
        if ($('.country_dropdown_open').length && !$(event.target).closest('.dropdown').length) {
            closeDropdown();
        }
    });
    $mainHeader.on('click', '.dropdown-menu li a', function () {
        var selectedText = $(this).text();
        var $countries = $(this).closest('.countries');
        $('.dropdown-toggle', $countries).text(selectedText);
        closeDropdown();
    });

    function onMenuItemMouseEnter() {
        onMegaMenuMouseLeave();
        var $thisMegaMenu = $(this).addClass('current').next('.mega-submenu');
        $thisMegaMenu.addClass('show');
        $thisMegaMenu.find('.tabs .tab').removeClass('active').first().addClass('active');
        $thisMegaMenu.find('.tab-content .content').removeClass('active').first().addClass('active');
    }

    function onNavMenuMouseLeave() {
        onMegaMenuMouseLeave();
    }

    function onMenuTabMouseEnter() {
        var $thisMegaMenu = $(this).closest('.mega-submenu');
        var tabIndex = $(this).index();

        $('.tab', $thisMegaMenu).removeClass('active');
        $(this).addClass('active');

        $('.content', $thisMegaMenu).removeClass('active');
        $('.content', $thisMegaMenu).eq(tabIndex).addClass('active');
    }

    function onMegaMenuMouseEnter() {
        state.megaMenuEntered = true;
    }

    function onMegaMenuMouseLeave() {
        $('.mega-submenu').removeClass('show');
        $('.has-submenu .menu-link').removeClass('current');
    }

    var $banner_carousel = $('.banner_carousel');

    $banner_carousel.slick({
        dots: true,
        autoplay: false,
        arrows: false,
        infinite: true,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        fade: true,
        cssEase: 'linear',
        appendDots: $('.slick-slider-dots', $('.bannerSection')),
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    dots: false,
                },
            },
        ],
    });

    function setSlickDotPos($slide) {
        var $content = $('.textWrapper', $slide);
        if ($content.length) {
            var top = $content.position().top + $content.outerHeight() + 231;
            $('.slick-dots', $('.bannerSection')).css({ top: top });
        }
    }

    if ($('.slick-track div[data-slick-index="0"]', $banner_carousel).length) {
        setSlickDotPos($('.slick-track div[data-slick-index="0"]', $banner_carousel));
    }

    $banner_carousel.on('afterChange', function (event, slick, currentSlide) {
        var $slide = $(slick.$slides[currentSlide]);
        setSlickDotPos($slide)
    });

    var percentTime;
    var tick;
    var time = .1;
    var progressBarIndex = 0;

    function startProgressbar() {
        resetProgressbar();
        percentTime = 0;
        tick = setInterval(interval, 30);
    }

    function interval() {
        if (($('.slick-track div[data-slick-index="' + progressBarIndex + '"]', $banner_carousel).attr('aria-hidden')) === 'true') {
            progressBarIndex = $('.slick-track div[aria-hidden="false"]', $banner_carousel).data('slickIndex');
            startProgressbar();
        } else {
            percentTime += 1 / (time + 5);
            $('.inProgress' + progressBarIndex, $banner_carousel).css({
                width: percentTime + '%',
            });
            if (percentTime >= 100) {
                $banner_carousel.slick('slickNext');
                progressBarIndex++;
                if (progressBarIndex > 2) {
                    progressBarIndex = 0;
                }
                startProgressbar();
            }
        }
    }

    function resetProgressbar() {
        $('.inProgress', $banner_carousel).css({
            width: 0 + '%',
        });
        clearInterval(tick);
    }
    startProgressbar();

    $banner_carousel.on('click', '.next-slide', function () {
        clearInterval(tick);
        $banner_carousel.slick('slickNext');
        startProgressbar();
    });

    $('.testimonial_full_carousel').each(function () {
        $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            speed: 300,
            arrows: true,
            adaptiveHeight: true,
            prevArrow: '<button type="button" class="slick-prev pull-left circle"><i class="long-arrow-left" aria-hidden="true"></i></button>',
            nextArrow: '<button type="button" class="slick-next pull-right circle"><i class="long-arrow-right" aria-hidden="true"></i></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        dots: true,
                        prevArrow: $('.slide_control .prev', this),
                        nextArrow: $('.slide_control .next', this),
                    },
                },
            ],
        });
    });

    $('.client_carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: false,
        arrows: false,
        centerMode: true,
        infinite: true,
        autoplay: true,
        speed: 300,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    centerMode: true,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                },
            },
        ],
    });

    $('.casestudy_slider').slick({
        slidesToShow: 1,
        dots: true,
        speed: 300,
        arrows: true,
        adaptiveHeight: false,
        centerMode: true,
        variableWidth: true,
        centerPadding: '0',
        prevArrow: '<button type="button" class="slick-prev pull-left circle"><i class="long-arrow-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next pull-right circle"><i class="long-arrow-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    prevArrow: $('.slide_control .prev', '.slider'),
                    nextArrow: $('.slide_control .next', '.slider'),
                    centerPadding: '0px',
                    arrows: false,
                    variableWidth: false,
                },
            },
        ],
    });

    $('.casestudy_carousel').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        speed: 300,
        arrows: true,
        adaptiveHeight: true,
        centerMode: true,
        centerPadding: '40px',
        prevArrow: '<button type="button" class="slick-prev pull-left circle"><i class="long-arrow-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next pull-right circle"><i class="long-arrow-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    prevArrow: $('.slide_control .prev', '.carousel'),
                    nextArrow: $('.slide_control .next', '.carousel'),
                    centerPadding: '0px',
                    arrows: false,
                    variableWidth: false,
                },
            },
        ],
    });
    $('.accordionSection').each(function () {
        var $this = $(this);
        $this.on('click', '.accordion-title:not(".active")', onAccordionTitleClick);
        $this.on('click', '.active', closeAccordion);
    });
    function closeAccordion() {
        $('.accordion-content').slideUp();
        $('.accordion-title.active').removeClass('active').find('.icon').removeClass('rotate-icon');
    }
    function onAccordionTitleClick() {
        var $this = $(this);
        closeAccordion();
        if (!$this.hasClass('active')) {
            $this.next('.accordion-content').slideDown();
            $this.addClass('active');
            $this.find('.icon').addClass('rotate-icon');
        }
    }

    var $people_carousel = $('.people_carousel');

    $people_carousel.slick({
        dots: false,
        autoplay: false,
        arrows: true,
        infinite: true,
        speed: 800,
        slidesToShow: 5,
        slidesToScroll: 5,
        adaptiveHeight: true,
        prevArrow: '<button type="button" class="slick-prev pull-left circle"><i class="long-arrow-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next pull-right circle"><i class="long-arrow-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    var state = {
        start: 0,
        n: 3,
        end: 3,
    };
    var $insightSection = $('.insightSection');

    $insightSection.on('click', '.loadMoreBtn', function (e) {
        e.preventDefault();
        var $insightsDataRow = $('.insightsDataRow', $insightSection);
        if (insightLoadMoreData) {
            var resultArr = insightLoadMoreData.slice(state.start, state.end);
            resultArr.forEach(function (item) {
                $insightsDataRow.append(
                    `<div class="col-xs-12 col-lg-4 cardCol">
                <div class="box contentBox">
                    <div class="contentCard">
                        <div class="content">
                            <div class="topInfo ${item.post_type}">
                                <span class="category">${item.post_type_name}</span>
                                <span class="date">${item.date}</span>
                            </div>
                            <h4 class="title">${item.title}</h4>
                            <div class="body">${item.body}</div>
                        </div>
                        <a href="${item.page_link}" class="btn--secondary medium">Read more</a>
                    </div>
                </div>
            </div>`
                );
            });
            state.start += state.n;
            state.end += state.n;
            if (insightLoadMoreData.length <= state.start) {
                $(this).hide();
            }
        }
    });

    function getQueryParams(qs) {
        qs = qs.split('+').join(' ');

        var params = {},
            tokens,
            re = /[?&]?([^=]+)=([^&]*)/g;

        while ((tokens = re.exec(qs))) {
            params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
        }

        return params;
    }

    function commonFilter() {
        var $commonFilterSection = $('.commonFilterSection');
        var $filterSearchInput = $('.filterSearchInput', $commonFilterSection);
        var $filterEventType = $('.filter_event_type');
        var $filterBtn = $('.filterBtn', $commonFilterSection);
        var query = getQueryParams(document.location.search);

        if (query && (query.action === 'filter') && (query.filterby || query.filterquery)) {
            var filterquery = query.filterquery;
            $filterSearchInput.val(filterquery);
            if (query.filterby) {
                var filterby = JSON.parse(query.filterby);
                if ($filterEventType.attr('data-posttype') === 'event') {
                    Object.keys(filterby).forEach(function (k) {
                        var list = filterby[k];
                        list.forEach(function (item) {
                            $('.custom_dropdown[data-tax="' + k + '"]').find('.select_box[data-slug="' + item + '"] ').addClass('selected').closest('.custom_dropdown').addClass('atLeastOneSelected');
                        });
                    });
                } else {
                    Object.keys(filterby).forEach(function (k) {
                        var list = filterby[k];
                        list.forEach(function (item) {
                            $('.custom_dropdown[data-tax="' + k + '"]').find('input[data-slug="' + item + '"] ').prop('checked', true);
                            $('.custom_dropdown input[data-slug="' + item + '"][data-taxonomy="' + k + '"] ').prop('checked', true);
                        });
                    });
                }
            } else if ($filterEventType.attr('data-posttype') === 'event') {
                $('.custom_dropdown.all', $commonFilterSection).addClass('atLeastOneSelected');
            }
        } else if ($filterEventType.attr('data-posttype') === 'event') {
            $('.custom_dropdown.all', $commonFilterSection).addClass('atLeastOneSelected');
        }

        var onFilterSelect = function ($this) {
            var $closestDd = $this.closest('.custom_dropdown');
            if ($filterEventType.attr('data-posttype') === 'event') {
                $('.custom_dropdown', $commonFilterSection).removeClass('atLeastOneSelected');
                $('.custom_dropdown .select_box', $commonFilterSection).removeClass('selected');
                $closestDd.toggleClass('atLeastOneSelected');
                var q = '?action=filter';
                if ($this.attr('data-slug') === 'all') {
                    if ($closestDd.hasClass('atLeastOneSelected')) {
                        $('.custom_dropdown:not(".all") .select_box', $commonFilterSection).addClass('selected');
                    }
                } else {
                    $this.toggleClass('selected');
                }

                var $checkedInputs = $('.custom_dropdown .select_box.selected', $commonFilterSection);
                if ($this.attr('data-slug') !== 'all' && $checkedInputs.length) {
                    var selectedOptions = {};
                    $checkedInputs.each(function () {
                        var term = $(this).attr('data-slug');
                        if (term !== 'all') {
                            var tax = $(this).closest('.custom_dropdown').attr('data-tax');
                            if (!selectedOptions[tax]) {
                                selectedOptions[tax] = [];
                            }
                            selectedOptions[tax].push(term);
                        }
                    });
                    q = q + '&filterby=' + JSON.stringify(selectedOptions);
                }
                var searchQ = $filterSearchInput.val();
                if (searchQ && searchQ.length > 2) {
                    q = q + '&filterquery=' + searchQ;
                }
                if ($filterEventType.length) {
                    q = q + '&event_type=' + $filterEventType.val();
                }
                var resultPage = $filterEventType.attr('data-target');
                window.location = resultPage + q;
            } else {
                $('.options', $commonFilterSection).hide();
                $('.options', $closestDd).toggle();
            }
        };

        $commonFilterSection.on('click', '.select_box', function () {
            onFilterSelect($(this));
        });
        $commonFilterSection.on('change', '.options label input[type="checkbox"]', function () {
            var $closestDd = $(this).closest('.custom_dropdown');
            var $checkedInputs = $('.options label input[type="checkbox"]:checked', $closestDd);
            if ($checkedInputs.length) {
                $closestDd.addClass('atLeastOneSelected');
                if (this.checked) {
                    $(this).closest('label').addClass('active');
                } else {
                    $(this).closest('label').removeClass('active')
                }
            } else {
                $closestDd.removeClass('atLeastOneSelected');
            }
        });
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.custom_dropdown').length) {
                $('.options', $commonFilterSection).hide();
            }
        });
        $commonFilterSection.on('keypress', '.filterSearchInput', function (e) {
            var key = e.which;
            if (key == 13) {
                if ($filterBtn.length) {
                    $filterBtn.trigger('click');
                } else {
                    onFilterSelect($('.custom_dropdown.atLeastOneSelected .select_box', $commonFilterSection));
                }
                return false;
            }
        });
        $filterBtn.on('click', function () {
            var resultPage = $(this).attr('data-target');
            var posttype = $(this).attr('data-posttype');
            var q = '?action=filter';
            var $checkedInputs = '';
            if (posttype === 'event') {
                $checkedInputs = $('.custom_dropdown.atLeastOneSelected .select_box', $commonFilterSection);
            } else {
                $checkedInputs = $('.options label input[type="checkbox"]:checked', $commonFilterSection);
            }

            if ($checkedInputs.length) {
                var selectedOptions = {};
                $checkedInputs.each(function () {
                    var $this = $(this);
                    var term = $this.attr('data-slug');
                    if (term !== 'all') {
                        var $closestDropdown = $this.closest('.custom_dropdown');
                        var tax = $closestDropdown.attr('data-tax');
                        var taxonomy = $this.attr('data-taxonomy');
                        var posttype = $this.attr('data-posttype');
                        if (taxonomy && posttype) {
                            tax = taxonomy;
                        }
                        if (!selectedOptions[tax]) {
                            selectedOptions[tax] = [];
                        }
                        selectedOptions[tax].push(term);
                    }
                });
                q = q + '&filterby=' + JSON.stringify(selectedOptions);
            }
            var searchQ = $filterSearchInput.val();
            if (searchQ && searchQ.length > 2) {
                q = q + '&filterquery=' + searchQ;
            }
            if ($filterEventType.length) {
                q = q + '&event_type=' + $filterEventType.val();
            }
            window.location = resultPage + q;
        });
    }

    commonFilter();

    function vimeoPlay($this) {
        var player = new Vimeo.Player($this.find('iframe')[0]);
        player.play().then(function () {
            console.log('playing');
        }).catch(function (error) {
            console.log(error.name);
            switch (error.name) {
                case 'PasswordError':
                    break;

                case 'PrivacyError':
                    break;

                default:
                    break;
            }
        });
    }


    function videoWithPosterImage() {
        $('.videoBox').each(function () {
            var $this = $(this);
            if (!$this.hasClass('autoplay')) {
                $this.on('click', '.poster_image, .poster_image .play', function () {
                    var $cloPosterImg = $(this).closest('.poster_image');
                    if (!$cloPosterImg.length) {
                        $cloPosterImg = $(this);
                    }
                    vimeoPlay($this);
                    $cloPosterImg.hide();
                });
            }
        });
    }

    videoWithPosterImage();

    function adjustHeight() {
        $('.insightHeroSection').each(function () {
            var $this = $(this);
            $('.insightBox', $this).css('min-height', $('.content_wrapper', $this).outerHeight());
        })
    }

    adjustHeight();

    function truncate(source, size) {
        return source.length > size ? source.slice(0, size - 1) + '…' : source;
    }

    function initTruncate($target) {
        $target.each(function () {
            $(this).html(truncate(this.innerHTML, 200));
        });
    }
    initTruncate($('.truncate'));

    var initResources = function () {
        var $resourcesSection = $('.resourcesSection');
        $resourcesSection.on('click', '.cta a', function (e) {
            e.preventDefault();
            window.location = $('select[name="select"]', $resourcesSection).val();
        });
    };
    initResources();

    function makeLinksSmooth() {
        const navLinks = document.querySelectorAll('.sub_nav a');
        navLinks.forEach((link) => {
            var href = link.getAttribute('href');
            if (href) {
                if (href.slice(0, 1) === '#') {
                    link.addEventListener('click', smoothScroll);
                }
            }
        });
    }

    function smoothScroll(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    }
    makeLinksSmooth();

    function removeHttpOrDoubleSlash(url) {
        return url.replace(/^(https?:)?\/\//, '');
    }

    function subNav() {
        var $subnavDropdown = $('.subnav-dropdown');
        var curUrl = removeHttpOrDoubleSlash(window.location.href);
        var selectedWithCurUrl = '';
        var isCurrPageUrl = false;
        $('ul li a', $subnavDropdown).each(function () {
            var thisHref = removeHttpOrDoubleSlash($(this).attr('href'));
            if (curUrl.indexOf(thisHref) > -1) {
                console.log(thisHref, curUrl);
                isCurrPageUrl = true;
                selectedWithCurUrl = this.innerText;
            }
        });
        console.log(isCurrPageUrl);
        if (isCurrPageUrl) {
            $('.selected-subnav .selected', $subnavDropdown).text(selectedWithCurUrl);
        } else {
            $('.selected-subnav .selected', $subnavDropdown).text($('ul li', $subnavDropdown).first().text());
        }

        $subnavDropdown.on('click', '.selected-subnav', function () {
            $('ul', $subnavDropdown).toggleClass('open').fadeToggle();
        });
        $subnavDropdown.on('click', 'ul li', function () {
            var selectedOption = $(this).text();
            $('.selected-subnav .selected', $subnavDropdown).text(selectedOption);
            if ($('ul', $subnavDropdown).hasClass('open')) {
                $('ul', $subnavDropdown).removeClass('open').fadeOut();
            }
        });
        $doc.on('click', function (event) {
            if ($('ul', $subnavDropdown).hasClass('open')) {

                if (!$(event.target).closest('.subnav-dropdown').length && !$(event.target).closest('ul').length) {
                    $('ul', $subnavDropdown).removeClass('open').fadeOut();
                }
            }
        });
    }
    subNav();

    var $sharePopup = $('.sharePopup');
    var $shareBtn = $('.shareBtn');
    var openShareLinkPopup = function () {
        $sharePopup.html(`
        <div class="sharePopupInner">
            <svg class="closeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                width="24px" height="24px">
                <path d="M11 0.7H13V23.3H11z" transform="rotate(-45.001 12 12)" />
                <path d="M0.7 11H23.3V13H0.7z" transform="rotate(-45.001 12 12)" />
            </svg>
            <a class="btn--primary basic small shareLink">
                <span>Share Link</span>
            </a>
        </div>
        `);

        var top = $shareBtn.offset().top + $shareBtn.outerHeight();
        var right = $doc.width() - ($shareBtn.offset().left + $shareBtn.outerWidth());
        $sharePopup.css({ 'top': top, 'right': right });

        setTimeout(function () {
            $sharePopup.fadeToggle();
        }, 100);
    };

    $shareBtn.on('click', function () {
        var shareData = {
            title: 'CMSPI',
            text: 'CMSPI',
            url: window.location.href,
        };
        if (!navigator.canShare) {
            console.log('Your browser doesn\'t support the Web Share API.');
            openShareLinkPopup();
        } else if (navigator.canShare(shareData)) {
            navigator.share(shareData).then(function () {
            }).catch(function () {
            });
        }
    });

    $sharePopup.on('click', '.shareLink', function () {
        var dummy = document.createElement('input');
        var text = window.location.href;

        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        $(this).find('span').addClass('copied').text('Copied');
    });

    $sharePopup.on('click', '.closeIcon', function () {
        $sharePopup.fadeOut();
    });
    $doc.on('click', function (event) {
        if ($sharePopup.is(':visible')) {
            if (!$(event.target).closest('.sharePopup').length && !$(event.target).closest('.shareBtn').length) {
                $sharePopup.fadeOut();
            }
        }
    });

    $(window).on('resize', function () {
        if ($sharePopup.is(':visible')) {
            $sharePopup.fadeOut();
        }
    });
    function applyButton() {
        var intId = setInterval(() => {
            (function ($) {
                var $whr_embed_hook = $('#whr_embed_hook');
                if ($('.whr-items', $whr_embed_hook).length) {
                    clearInterval(intId);
                    $('.whr-items', $whr_embed_hook).each(function () {
                        var link = $('.whr-title a', this).attr('href');
                        $('.whr-item', this).append('<a href="' + link +
                            '" class="btn--secondary-light basic small shareBtn">Apply</a>'
                        );
                    });
                }
            })(jQuery);
        }, 500);
    }
    applyButton();

    var headerHeight = $mainHeader.outerHeight();

    $(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        if ($mainHeader.hasClass('sticky-header')) {
            scrollTop += headerHeight;
        }
        if (scrollTop > headerHeight) {
            $mainHeader.addClass('sticky-header').slideDown('slow');
        } else {
            $mainHeader.removeClass('sticky-header').css('display', '');
        }
    });
});
