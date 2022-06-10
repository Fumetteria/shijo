(function( $ ) {
    'use strict';
    $(document).ready(function() {
      // Call Magnific Popup.
      $('.post-img-link').magnificPopup({
        type: 'image'
      });
      /* Old galleries */
      $('.gallery').each(function() {
        $(this).magnificPopup({
          delegate: 'a',
          gallery: {
            enabled: true,
            tCounter: '<span class="mfp-counter">%curr% di %total%</span>'
          },
          type: 'image'
        })
      });
      /* New galleries */
      $('.wp-block-gallery .wp-block-image a').filter(function() {
        return $(this).attr('href').match(/\.(jpeg|jpg|png|gif)/i);
        }).magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
                tCounter: '<span class="mfp-counter">%curr% di %total%</span>'
            }
        });
        var menu = document.getElementById("site-navigation");
        $('.menu-bars').click( function() {
            var menuStyle = getComputedStyle( menu );
            const menuDisplay = menuStyle.display;
            if ( menuDisplay === "none" ) {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        });
    });
})( jQuery );