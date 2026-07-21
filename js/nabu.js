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
    //
    // Automatisches Weiterschalten ist nur aktiv, wenn es im Customizer
    // eingeschaltet wurde UND der Besucher nicht "prefers-reduced-motion"
    // gesetzt hat. Laeuft es, gibt es eine Pause-Taste (WCAG 2.2.2).
    /////////////////////////////////////////////////////////////////////
    var $carousel = $('#nabu-carousel');

    if ($carousel.length) {
        var vars      = window.nabuVars || {};
        var intervall = parseInt(vars.carouselInterval, 10) || 5000;
        var reduziert = window.matchMedia &&
                        window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var autoplay  = !!vars.carouselAutoplay && !reduziert;

        $carousel.carousel({
            interval: autoplay ? intervall : false,
            pause:    'hover'
        });

        var $toggle = $('.nabu-carousel-toggle');

        // Bootstrap schaltet das Intervall in der Instanzkonfiguration. Wird es
        // dort auf false gesetzt, startet auch ein spaeteres cycle() keinen
        // Timer mehr - noetig, weil Bootstrap bei mouseleave selbst cycle()
        // aufruft und den Slider sonst gegen den Nutzerwunsch neu startet.
        var setzeIntervall = function (wert) {
            var daten = $carousel.data('bs.carousel');
            if (daten && daten._config) {
                daten._config.interval = wert;
            }
        };

        var zeigeZustand = function (laeuft) {
            $toggle
                .attr('data-state', laeuft ? 'playing' : 'paused')
                .attr('aria-label', laeuft ? vars.pauseLabel : vars.playLabel)
                .find('i')
                .toggleClass('fa-pause', laeuft)
                .toggleClass('fa-play', !laeuft);
        };

        if (!autoplay) {
            setzeIntervall(false);
            $carousel.carousel('pause');
            // Bei reduzierter Bewegung bleibt die Taste sichtbar, damit der
            // Besucher die Bewegung bei Bedarf selbst starten kann.
            zeigeZustand(false);
        }

        $toggle.on('click', function () {
            var laeuftGerade = $(this).attr('data-state') === 'playing';

            if (laeuftGerade) {
                setzeIntervall(false);
                $carousel.carousel('pause');
            } else {
                setzeIntervall(intervall);
                $carousel.carousel('cycle');
            }

            zeigeZustand(!laeuftGerade);
        });
    }

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
