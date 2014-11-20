$(function() {
	window.scrollReveal = new scrollReveal();
	"use strict";
	
	// PreLoader
	$(window).load(function() {
		$(".loader").fadeOut(400);
	});

	// Backstretchs
	$("#body").backstretch("images/3.jpg"); 
	//$("#services").backstretch("images/3.jpg");
	
	// Countdown
	$('.countdown').downCount({
		date: '12/12/2014 23:59:59', /*MM/DD/YY*/
		offset: +10
	});			
    
});