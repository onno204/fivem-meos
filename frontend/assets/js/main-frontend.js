
$(document).ready(function(){
	$('.nav-item:has(.drodownContent) a').append("<div class=\"fas fa-chevron-down\"></div>");
	$('.nav-item:has(.drodownContent)').mouseenter(function(){
		$(this).children(".drodownContent").stop().slideDown();
	}).mouseleave(function(){
		$(this).children(".drodownContent").stop().slideUp();
	});//.addClass("navitem-containsdropdown");
});

function toggleNavBar(){
	$("nav").toggleClass("nav-collaps");
}
