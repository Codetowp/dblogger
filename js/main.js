
jQuery(function($) { // DOM is now read and ready to be manipulated
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.eq-blocks');
});


$(window).resize(function(){
  equalheight('.eq-blocks');
});

});







function main() {

(function () {
   'use strict';









    /*====================================
    Show Menu on Book
    ======================================*/
    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 10;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('on');
        } else {
            $('.navbar-default').removeClass('on');
        }
    });

    $('body').scrollspy({ 
        target: '.navbar-default',
        offset: 10
    })

  	
  


	/*====================================
    top -menu
    ======================================*/

$('#top-menu.navbar-default li:has(ul)').addClass('menu-item-has-children');




$('#Guide-list1').hover(function() {
     $('.img-list-1').addClass('img-active');
}, function() {
     $('.img-list-1').removeClass('img-active');
});


$('#Guide-list2').hover(function() {
     $('.img-list-2').addClass('img-active');
}, function() {
     $('.img-list-2').removeClass('img-active');
});

$('#Guide-list3').hover(function() {
     $('.img-list-3').addClass('img-active');
}, function() {
     $('.img-list-3').removeClass('img-active');
});

$('#Guide-list4').hover(function() {
     $('.img-list-4').addClass('img-active');
}, function() {
     $('.img-list-4').removeClass('img-active');
});
$('#Guide-list5').hover(function() {
     $('.img-list-5').addClass('img-active');
}, function() {
     $('.img-list-5').removeClass('img-active');
});
$('#Guide-list6').hover(function() {
     $('.img-list-6').addClass('img-active');
}, function() {
     $('.img-list-6').removeClass('img-active');
});
$('#Guide-list7').hover(function() {
     $('.img-list-7').addClass('img-active');
}, function() {
     $('.img-list-7').removeClass('img-active');
});


$('.guide-block .nav-tabs > li > a').hover(function() {
  $(this).tab('show');
});

  	/*====================================
    Portfolio Isotope Filter
    ======================================*/
    $(window).load(function() {
        var $container = $('#lightbox');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
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