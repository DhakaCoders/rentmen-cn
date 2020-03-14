(function($) {
var windowWidth = $(window).width();
/*Google Map*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}




if( $('#mapID').length ){
var latitude = $('#mapID').data('latitude');
var longitude = $('#mapID').data('longitude');

var myCenter= new google.maps.LatLng(latitude,  longitude);
function initialize(){
    var mapProp = {
      center:myCenter,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      styles: CustomMapStyles
      };

    var map= new google.maps.Map(document.getElementById('mapID'),mapProp);
    var marker= new google.maps.Marker({
      position:myCenter,
        //icon:'map-marker.png'
      });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

}


/*Shoriful*/






/*Milon*/

/*
=======================
  cookise-close-btn js
=======================
*/
if ($('.catapult-close-btn').length) {
  $('.catapult-close-btn').on('click', function(){
    $('#catapult-cookie-bar').hide('slow');
  });
  $('#catapultCookie').on('click', function(){
    $('#catapult-cookie-bar').hide('slow');
  });

}


/*
----------------------
 Tabs Js
----------------------
*/

$('.tabs:first').show();
$('.tabs-menu li:first').addClass('active');

$('.tabs-menu li').on('click',function(){
  index = $(this).index();
  $('.tabs-menu li').removeClass('active');
  $(this).addClass('active');
  $('.tabs').hide();
  $('.tabs').eq(index).show();
});

/* -- Contact page left border and right bg control --*/


function sectionResize(){
  windowWidth = $(window).width();
  if (windowWidth >=768) {
    var hmTwoGridRgtHeight = $('.hm-two-grid-sec-wrp').outerHeight();
    var containerWidth = $('.hm-two-grid-sec-wrp .container').width();
    var LftOrRgtWidth = ( (windowWidth-containerWidth)/2 )+330;
    $('.hm-two-grid-sec-bg').css({"height": hmTwoGridRgtHeight, "width":LftOrRgtWidth});
  }
}
sectionResize();
$(window).on('resize', function(){
  sectionResize();
});

if (windowWidth <= 639) {
  $('.categorie-xs-btn span').on('click',function(){
    $('.hm-post-categorie-wrp').slideToggle(500);
  });
}


if (windowWidth < 768) {
  if( $('.dft-slider-pagi').length ){
      $('.dft-slider-pagi').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
      });
  }
}

if( $('.hm-slider-wrp').length ){
    $('.hm-slider-wrp').slick({
      pauseOnHover: false,
      autoplay: true,
      autoplaySpeed: 6000,
      arrows:false,
      dots: false,
      infinite: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
    });
}


/*
-----------------------
Start Contact Google Map ->> 
-----------------------
*/
if( $('#googlemap').length ){
    var latitude = $('#googlemap').data('latitude');
    var longitude = $('#googlemap').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    function initialize(){
        var mapProp = {
          center:myCenter,

          mapTypeControl:false,
          scrollwheel: false,

          zoomControl: false,
          disableDefaultUI: true,
          zoom:17,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : CustomMapStyles
      };
      var map= new google.maps.Map(document.getElementById('googlemap'),mapProp);

      var marker= new google.maps.Marker({
        position:myCenter,
        icon:'assets/images/map-marker.png'
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}





/*Prashanto*/

//slick slider

if( $('.product-slider-wrp').length ){

  $('.bigViewSlider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 700,
    fade: true,
    dots: false,
    arrows: false,
    asNavFor: '.thumbSlider'
  });

  $('.thumbSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    speed: 700,
    dots: false,
    arrows: true, 
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,
    asNavFor: '.bigViewSlider',
    prevArrow: $('.thumbSlider-arrows .leftArrow'),
    nextArrow: $('.thumbSlider-arrows .rightArrow'),
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          vertical: false,
          verticalSwiping: false,
        }
      }
    ]
  });
}


if( $('.interestedItemSlider').length ){
  $('.interestedItemSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    speed: 700,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}



if( $('.organizePartySlider').length ){
  $('.organizePartySlider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: true,
    speed: 700,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 476,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}



if( $('.overview-feature-slider').length ){
  $('.overview-feature-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    speed: 700,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}


if( $('.organize-party-bg-slider').length ){
  $('.organize-party-bg-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    speed: 700,
    dots: false,
    arrows: true,
    prevArrow: $('.organizeSlider-arrows .leftArrow'),
    nextArrow: $('.organizeSlider-arrows .rightArrow'),
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}


//products counter
if( $('.pro-counter .qty').length ){
  $('.pro-counter .qty').each(function() {
    var spinner = $(this),
      input = spinner.find('input[type="number"]'),
      btnUp = spinner.find('.plus'),
      btnDown = spinner.find('.minus'),
      min = 1,
      max = input.attr('max');

    btnUp.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue <= max) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

    btnDown.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue <= min) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

  });

}


//price renge slider
if( $('.price-slider').length ){
  var outputSpan = $('#spanOutput');
  var sliderDiv = $('#slider');

  sliderDiv.slider({
    range: true,
    min: 0,
    max: 200,
    values: [23.99, 119.99],
    slide: function (event, ui) {
      outputSpan.html(ui.values[0] + ' - ' + ui.values[1] + ' Years');
      $('#minAmount').val(ui.values[0]);
      $('#maxAmount').val(ui.values[1]);
    }
  });

  outputSpan.html(sliderDiv.slider('values', 0) + ' - '
    + sliderDiv.slider('values', 1) + ' Years');
  $('#minAmount').val(sliderDiv.slider('values', 0));
  $('#maxAmount').val(sliderDiv.slider('values', 1));

}



$('input[type="checkbox"]').change(function(){
  this.value = (Number(this.checked));
});


// footer slide menu
$('.ftr-col h6').on('click', function(){
  $(this).toggleClass('active');
  $(this).parent().siblings().find('h6').removeClass('active');
  $(this).parent().find('ul').slideToggle(300);
  $(this).parent().siblings().find('ul').slideUp(300);
});


// sidebar slide filter
$('.pro-overview-sidebar-head').on('click', function(){
  $(this).toggleClass('active');
  $(this).parent().siblings().find('.pro-overview-sidebar-head').removeClass('active');
  $(this).parent().find('.pro-filter-main').slideToggle(300);
  $(this).parent().siblings().find('.pro-filter-main').slideUp(300);
});

$('.pro-overview-sidebar-sm-con').on('click', function(){
  $(this).toggleClass('active');
  $(this).next().slideToggle(300);
});



/*Rannojit*/


if( $('.dft-question-mark-slider').length ){
    $('.dft-question-mark-slider').slick({
      dots: false,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

if( $('.dft-blog-slider').length ){
    $('.dft-blog-slider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

$('li.menu-item-has-children > a').on('click', function(){
    $(this).toggleClass('xs-sub-menu-expend');
    $('.sub-menu').slideToggle(300);
});

$('.xs-menu-bar-open').on('click', function(){
    $('.xs-pop-up-menu').show();
});
$('.xs-menu-bar-close').on('click', function(){
    $('.xs-pop-up-menu').hide();
});




    new WOW().init();

})(jQuery);