


/* JavaScript for Animation */	

/* Hero */

$('.hero-h1').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInLeft');
	}, { offset: '100%' });
	
$('.hero-p').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInRight');
	}, { offset: '100%' });

/* Service Images */

$('.simg-one').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInDown');
	}, { offset: '100%' });

$('.simg-two').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { offset: '70%' });
	
$('.simg-three').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInDown');
	}, { offset: '70%' });

$('.simg-four').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInUp');
	}, { offset: '70%' });

$('.simg-five').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInDown');
	}, { offset: '70%' });
	
$('.simg-six').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { offset: '70%' });
	
$('.simg-seven').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('fadeInDown');
	}, { offset: '70%' });
	
$('.simg-eight').waypoint(function(down) {
		$(this).addClass('animation');
		$(this).addClass('tada');
	}, { offset: '70%' });
	


