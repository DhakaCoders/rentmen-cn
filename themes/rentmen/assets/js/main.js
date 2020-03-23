(function($) {
var windowWidth = $(window).width();
/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};


var maxHeight = 0;
if($('.equalheight').length){
$(".equalheight").each(function(){
   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
});

$(".equalheight").height(maxHeight);
}

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

$('#sortproduct').on('change', function(){               
  var campSort = $(this).val();
  var URL = $('#sortproduct').data('url');
  setCookie('sorting', campSort, 1);
  window.location.href = URL;
});

/*
=======================
  cookise-close-btn js
=======================
*/
if ($('.catapult-cookie-wrp').length) {

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
if( $('.tabs').length ){
  $('.tabs:first').show();
  $('.tabs-menu li:first').addClass('active');

  $('.tabs-menu li').on('click',function(){
    index = $(this).index();
    $('.tabs-menu li').removeClass('active');
    $(this).addClass('active');
    $('.tabs').hide();
    $('.tabs').eq(index).show();
  });
}

/* -- Contact page left border and right bg control --*/

if( $('.hm-two-grid-sec-wrp').length ){
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

}

if (windowWidth <= 639) {
  $('.categorie-xs-btn span').on('click',function(){
    $('.hm-post-categorie-wrp').slideToggle(500);
  });
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
    var homeurl = $('#googlemap').data('homeurl');

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
        icon:homeurl+'/assets/images/map-marker.png'
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}



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

if (windowWidth > 767) {
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
}

  if( $('.organizePartySlider-1').length ){
    $('.organizePartySlider-1').slick({
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
            slidesToScroll: 1,
            dots: true,
            arrows: false
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



  if( $('.organizePartySlider-2').length ){
    $('.organizePartySlider-2').slick({
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
            slidesToScroll: 1,
            dots: true,
            arrows: false
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
          slidesToScroll: 1,
          dots: true,
          arrows: false
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


// footer slide menu
$('.ftr-col h6').on('click', function(){
  $(this).toggleClass('active');
  $(this).parent().siblings().find('h6').removeClass('active');
  $(this).parent().find('ul').slideToggle(300);
  $(this).parent().siblings().find('ul').slideUp(300);
});


// sidebar slide filter
if (windowWidth < 768) {
  $('.pro-overview-sidebar-sm-con').on('click', function(){
    $(this).toggleClass('active');
    $(this).next().slideToggle(300);
  });
  
  $('.pro-overview-sidebar-head').on('click', function(){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('.pro-overview-sidebar-head').removeClass('active');
    $(this).parent().find('.pro-filter-main').slideToggle(300);
    $(this).parent().siblings().find('.pro-filter-main').slideUp(300);
  });

  
}

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

if (windowWidth < 768) {
  $('header .rm-search-submit-btn').on('click', function(){
    $('.hdr-btmbar').toggleClass('hdr-btmbar-cntlr');
  });
}

/**
* Sidebar Filter
*/
var tags = [];
var tagsNow = [];
var allTags = [];
var pMin = parseInt( $('#minAmount').val());
var pMax = parseInt($('#maxAmount').val());
var pMinNow = 0;
var pMaxNow = 0;
if( $('.price-slider').length ){
  $("#slider").slider({
      range: true,
      min: 0,
      max: 500,
      step: 1,
      values: [pMin, pMax],
      animate: 'slow',
      create: function(event, ui) {
          $('#min').appendTo($('#slider span.ui-slider-handle').get(0));
          $('#max').appendTo($('#slider span.ui-slider-handle').get(1));
          pMinNow = parseInt(pMin);
          pMaxNow = parseInt(pMax);
      },
      slide: function(event, ui) { 
        $(ui.handle).find('i').html('€' + ui.value); 
        $('#minAmount').val(ui.values[0]);
        $('#maxAmount').val(ui.values[1]);
      },
      stop: function( event, ui ) {
        $('#minAmount').val(ui.values[0]);
        $('#maxAmount').val(ui.values[1]);
        if( ui.values[0] != pMinNow ){
          pMinNow = parseInt(ui.values[0]);
          setupRequest();
        }
        if( ui.values[1] != pMaxNow ){
          pMaxNow = parseInt(ui.values[1]);
          setupRequest();
        }      
      }
  });
  // only initially needed
  $('#min').html('€' + $('#slider').slider('values', 0)).position({
      my: 'center top',
      at: 'center top',
      of: $('#slider span.ui-slider-handle:eq(0)'),
      offset: "0, 10"
  });

  $('#max').html('€' + $('#slider').slider('values', 1)).position({
      my: 'center top',
      at: 'center top',
      of: $('#slider span.ui-slider-handle:eq(1)'),
      offset: "0, 10"
  });
}

$('.filterCheckboxs input[type=checkbox]').each(function(){
  var id = $(this).val();
  if($(this).is(':checked')){
    tagsNow.push(id);
    //tagsNow.push(id);
  }
});

$('.filterCheckboxs').on('change', 'input[type=checkbox]', function() {
  var id = $(this).val(); // this gives me null
  var index = tagsNow.indexOf(id);
  
  if($(this).is(':checked')){
    tagsNow.push(id);
  }
  else{
    if (index > -1) {
      tagsNow.splice(index, 1);
    }
  }
  //tagsNow.concat(tags); 
  setupRequest();
});

function setupRequest(){
  var isReq = false;
  var rqtURL = '';
  var rqtURL1 = '';
  var rqtURL2 = '';
  var rqtTo = $('#thisURL').attr('data-url');
  
  //Prices
  if( 0 != pMinNow || 500 != pMaxNow ){
    isReq = true;
    rqtURL1 = 'price='+pMinNow+','+pMaxNow;
  }else{
    rqtURL1 = '';
  }

  //Tags
  hasTags = isEqual(tags, tagsNow);
  if( tagsNow.length ){
    isReq = true;
    ftags = arraySeparator(tagsNow, ',');
    rqtURL2 = 'tags='+ftags;
  }

  if( rqtURL1 != '' ){
    rqtURL = '?'+rqtURL1;
    if( rqtURL2 != '' ){
      rqtURL = '?'+rqtURL1+'&'+rqtURL2;
    }
  }else{
    rqtURL = '?'+rqtURL2;
  }

  if( isReq ){
    var genRqURL = rqtTo+rqtURL;
    window.location.href = genRqURL;
  }else{
    window.location.href = rqtTo;
  }
// '/?price=12,20&tags=tag1,tag2';
// '/shop/?min_price=20&max_price=30';
}

function arraySeparator(arr, sep){
  var string = '';
  if( arr.length ){
    for(var i=0; i<arr.length; i++){
      string += arr[i]
      if( i < arr.length - 1 ){ string += sep }
    }
  }
  return string;
}

function isEqual(a, b){
  var isEqual = true;
  if(a.length != b.length) {
    isEqual = false; 
  }else{
    //comapring each element of array 
    for(var i=0; i<a.length; i++){
      aVal = a[i];
      index = b.indexOf(aVal); 
      if (index == -1) {
        isEqual = false;
      }
    }
  }
  return isEqual;
}

})(jQuery);


function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}