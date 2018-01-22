jQuery(function(jQuery) { // DOM is now read and ready to be manipulated
    equalheight = function(container) {

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            jQueryel,
            topPosition = 0;
        jQuery(container).each(function() {

            jQueryel = jQuery(this);
            jQuery(jQueryel).height('auto')
            topPostion = jQueryel.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = jQueryel.height();
                rowDivs.push(jQueryel);
            } else {
                rowDivs.push(jQueryel);
                currentTallest = (currentTallest < jQueryel.height()) ? (jQueryel.height()) : (currentTallest);
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    jQuery(window).load(function() {
        equalheight('.eq-blocks');
    });


    jQuery(window).resize(function() {
        equalheight('.eq-blocks');
    });

});

function main() {

    (function() {
        'use strict';

        /*====================================
        Show Menu
        ======================================*/
        jQuery(window).bind('scroll', function() {
            var navHeight = jQuery(window).height() - 10;
            if (jQuery(window).scrollTop() > navHeight) {
                jQuery('.navbar-default').addClass('on');
            } else {
                jQuery('.navbar-default').removeClass('on');
            }
        });

        jQuery('body').scrollspy({
            target: '.navbar-default',
            offset: 10
        })


    /*====================================
    Top Menu
    ======================================*/

        jQuery('#top-menu.navbar-default li:has(ul)').addClass('menu-item-has-children');

        jQuery('#Guide-list1').hover(function() {
            jQuery('.img-list-1').addClass('img-active');
        }, function() {
            jQuery('.img-list-1').removeClass('img-active');
        });

        jQuery('#Guide-list2').hover(function() {
            jQuery('.img-list-2').addClass('img-active');
        }, function() {
            jQuery('.img-list-2').removeClass('img-active');
        });

        jQuery('#Guide-list3').hover(function() {
            jQuery('.img-list-3').addClass('img-active');
        }, function() {
            jQuery('.img-list-3').removeClass('img-active');
        });

        jQuery('#Guide-list4').hover(function() {
            jQuery('.img-list-4').addClass('img-active');
        }, function() {
            jQuery('.img-list-4').removeClass('img-active');
        });
		
        jQuery('#Guide-list5').hover(function() {
            jQuery('.img-list-5').addClass('img-active');
        }, function() {
            jQuery('.img-list-5').removeClass('img-active');
        });
		
        jQuery('#Guide-list6').hover(function() {
            jQuery('.img-list-6').addClass('img-active');
        }, function() {
            jQuery('.img-list-6').removeClass('img-active');
        });
		
        jQuery('#Guide-list7').hover(function() {
            jQuery('.img-list-7').addClass('img-active');
        }, function() {
            jQuery('.img-list-7').removeClass('img-active');
        });


        jQuery('.guide-block .nav-tabs > li > a').hover(function() {
            jQuery(this).tab('show');
        });

    /*====================================
    Portfolio Isotope Filter
    ======================================*/
        jQuery(window).load(function() {
            var jQuerycontainer = jQuery('#lightbox');
            jQuerycontainer.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            jQuery('.cat a').click(function() {
                jQuery('.cat .active').removeClass('active');
                jQuery(this).addClass('active');
                var selector = jQuery(this).attr('data-filter');
                jQuerycontainer.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });

        });
    }());
}
main();