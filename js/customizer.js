/**
 * NABU Theme Customizer Live-Vorschau
 */
(function ($) {
    'use strict';

    // Seitentitel Live-Update
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

}(jQuery));
