/**
 * NABU Theme JavaScript
 * Initialisierung: Navigation, Slick-Slider, Mobile-Menu
 */
jQuery(document).ready(function ($) {

    /////////////////////////////////////////////////////////////////////
    // Dreieck für Karten (Cards mit Bild erhalten CSS-Dreieck-Marker)
    /////////////////////////////////////////////////////////////////////
    $('.card:has(.card-img-top)').addClass('card-triangle');

    /////////////////////////////////////////////////////////////////////
    // Haupt-Navigation: Elemente gleichmäßig auf volle Breite verteilen
    /////////////////////////////////////////////////////////////////////
    var $mainNavItems = $('.navbar .hidden-md-down .nav .nav-item');
    var navCount = $mainNavItems.length;

    if (navCount > 0) {
        var itemWidth = 100 / navCount;
        $mainNavItems.css({
            'text-align': 'center',
            'margin': 0,
            'border-left': '1px solid rgba(255,255,255,0.3)',
            'width': itemWidth + '%'
        });
        $mainNavItems.first().css('border-left', 'none');
    }

    /////////////////////////////////////////////////////////////////////
    // Mobile Sidebar-Navigation (Unterseiten)
    // Kopiert den Inhalt der rechten Sidebar-Nav in das mobile Menü
    /////////////////////////////////////////////////////////////////////
    var $sidebarNav = $('.nav-main-right');
    var $mobileNav  = $('#mobilenavleft');

    if ($sidebarNav.length && $mobileNav.length) {
        $mobileNav.html($sidebarNav.html());

        // Vertikale Position des mobilen Menüs anpassen
        var $mobileToggle = $('a.mobilenavleft');
        if ($mobileToggle.length) {
            var topPosition = $mobileToggle.offset().top;
            $mobileNav.css('top', topPosition);
        }

        // Toggle für mobiles Menü
        $('a.mobilenavleft').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('mobilenavleft-open');
        });

        // Schließen bei Klick außerhalb
        $(document).on('click', function (e) {
            if ($('body').hasClass('mobilenavleft-open')) {
                if (!$(e.target).closest('#mobilenavleft').length &&
                    !$(e.target).closest('a.mobilenavleft').length) {
                    $('body').removeClass('mobilenavleft-open');
                }
            }
        });
    }

    /////////////////////////////////////////////////////////////////////
    // Slick-Slider für Neuigkeiten auf der Startseite
    /////////////////////////////////////////////////////////////////////
    var $slider = $('.slick');

    if ($slider.length) {
        $slider.slick({
            slidesToShow:   3,
            slidesToScroll: 1,
            nextArrow:      $('#slickright'),
            prevArrow:      $('#slickleft'),
            speed:          200,
            infinite:       true,
            responsive: [
                {
                    breakpoint: 960,
                    settings: {
                        slidesToShow:   2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 751,
                    settings: {
                        slidesToShow:   2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow:   1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    /////////////////////////////////////////////////////////////////////
    // Bootstrap Carousel initialisieren
    /////////////////////////////////////////////////////////////////////
    $('#nabu-carousel').carousel({
        interval: 5000,
        pause:    'hover'
    });

    /////////////////////////////////////////////////////////////////////
    // Tastaturnavigation für Barrierefreiheit (Escape schließt Menü)
    /////////////////////////////////////////////////////////////////////
    $(document).on('keyup', function (e) {
        if (e.key === 'Escape' || e.keyCode === 27) {
            $('body').removeClass('mobilenavleft-open');
            // Bootstrap mobile nav schließen
            $('#mobilenav').collapse('hide');
        }
    });

});
