
$(document).ready(function(){
  
  $('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('active');
    $('.tab-content').removeClass('active');

    $(this).addClass('active');
    $("#"+tab_id).addClass('active');
  })

  $('.side-srv a').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('.side-srv a').removeClass('active');
        $('.content-tab').removeClass('active');

        $(this).addClass('active');
        $("#"+tab_id).addClass('active'); 
    })

    $( ".side-srv ul" ).click(function( event ) {
      $val = $(event.target).text();
      $('.right .title-srv').html($val); 
      // alert($val); 
    });

}) 


$('.slide-banner').slick({
    autoplay: false,
    arrow: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
}); 

$('.slide-tab').slick({
    autoplay: false,
    arrow: false,
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        }
    ],
}); 

$('.slide-rule').slick({
    autoplay: false,
    arrow: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
}); 

$('.row-slide').slick({
    autoplay: false,
    arrow: false,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 1, 
    infinite: true,
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 767,
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
    ],
}); 

$('.slider-for').slick({
    autoplay: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav',
});
$('.slider-nav').slick({
    autoplay:false,
    arrow:false,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }
    ],
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    prevArrow: '', 
    nextArrow: '', 
});

if ($(window).innerWidth() <= 768) {

    $('.slide-srv-mb').slick({
        autoplay: false,
        arrow: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1, 
        infinite: true,
        prevArrow: '',
        nextArrow: '',  
    }); 

    $('.side-srv a').click(function(event) {
        $('.side-srv a').removeClass('active');
        $('.box-srv-mobile').removeClass('active'); 
        $(this).addClass('active');
        $(this).next().addClass('active'); 
    });
}

jQuery(document).ready(function( $ ) {
  $("#menu").mmenu({
     "extensions": [
        "fx-menu-zoom"
     ],
     "counters": true
  });
});



var count_title_detail = 1;
$( ".content-detail h2" ).each( function( index, element ){
    console.log( $( this ).text() );
    var title_detail = $(this).text();
    $(this).attr({
        'id': count_title_detail++,
    });
});

$('.mluc-bar a').click(function(e){
  e.preventDefault();
  var target = $($(this).attr('href'));
  if(target.length){
    var scrollTo = target.offset().top - 48;
    $('body, html').animate({scrollTop: scrollTo+'px'}, 800);
  }});