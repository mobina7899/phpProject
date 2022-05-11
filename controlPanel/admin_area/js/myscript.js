
	// فراخوانی هدر و فووتر
	$(document).ready(function(){
		$("#HeaderContent").load('Header.html');
		$("#FooterContent").load('Footer.html');

	
	
// اسکرول نرم صفحه

$(function() {
	$('#but-back').click(function() {
	  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
		  $('html,body').animate({
			scrollTop: target.offset().top
		  }, 1000);
		  return false;
		}
	  }
	});
  })
		// قوانین
			$('div.rule-title').click(function(){
				$(this).next('.sub-title').addClass('cur')
				$(this).siblings('.sub-title').not('.cur').slideUp();
				$(this).next('.sub-title').slideToggle().toggleClass('open');
				$(this).next('.sub-title').removeClass('cur')
			})
});








