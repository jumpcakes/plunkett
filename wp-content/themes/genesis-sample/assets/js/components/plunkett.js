$( document ).ready(function($) {
	console.log('ready');
    $('.toggle-container').click(function() {
    	alert('hey');
    	$('.widget-area.header-widget-area,#menu-main').slideToggle('slow');
    });
});
