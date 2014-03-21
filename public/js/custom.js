/* JS */


/* Parallax Slider */
  $(function() {
    $('#da-slider').cslider({
      autoplay  : true,
      interval : 8000
    });
  });


/* Flex image slider */


   $('.flex-image').flexslider({
      direction: "vertical",
      controlNav: false,
      directionNav: true,
      pauseOnHover: true,
      slideshowSpeed: 10000      
   });

/* Refind slider */

    $('#rs-slider').refineSlide({
        transition : 'random'
    });


/* Support */

$("#slist a").click(function(e){
   e.preventDefault();
   $(this).next('p').toggle(200);
});

/* Tooltip */

$('#price-tip1').tooltip();



/* Portfolio filter */

/* Isotype */

// cache container
var $container = $('#portfolio');
// initialize isotope
$container.isotope();

// filter items when filter link is clicked
$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});

/* Pretty Photo for Gallery*/

jQuery(".prettyphoto").prettyPhoto({
overlay_gallery: false, social_tools: false
});

/* Scroll to Top */


  $(".totop").hide();

  $(function(){
	$(window).scroll(function(){
	  if ($(this).scrollTop()>300)
	  {
		$('.totop').slideDown();
	  } 
	  else
	  {
		$('.totop').slideUp();
	  }
	});

	$('.totop a').click(function (e) {
	  e.preventDefault();
	  $('body,html').animate({scrollTop: 0}, 500);
	});

  });	
/* Feature */

$('.feature-one-image').waypoint(function(down) {
	$(this).addClass('animation');
	$(this).addClass('bounceInLeft');
}, { offset: '70%' });

$('.feature-one-content').waypoint(function(down) {
	$(this).addClass('animation');
	$(this).addClass('bounceInRight');
}, { offset: '70%' });

$('.feature-two-content').waypoint(function(down) {
	$(this).addClass('animation');
	$(this).addClass('bounceInLeft');
}, { offset: '70%' });

$('.feature-two-image').waypoint(function(down) {
	$(this).addClass('animation');
	$(this).addClass('bounceInRight');
}, { offset: '70%' });

/* prettyPhoto Gallery */

jQuery(".prettyphoto").prettyPhoto({
   overlay_gallery: false, social_tools: false
});