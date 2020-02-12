/* Author:

*/

$(function() {
	$.backstretch("img/ace.jpg");
	var imagesSrc = ["img/ace.jpg", "img/city.jpg", "img/road.jpg"];

	for (var i = imagesSrc.length - 1; i >= 0; i--) {
		var src = imagesSrc[i];
		var imgNode = document.createElement('img');
		imgNode.src = src;
	}

	$('.local-nav').click(function(event) {

		$t = $(event.currentTarget);
		var section = $t.data('go');

		// backgrounds!
		if(section == "writing") {
			$.backstretch("img/city.jpg", { fade: 250 });
		} else if(section == "coding") {
			$.backstretch("img/road.jpg", { fade: 250 });
		} else if(section == "home") {
			$.backstretch("img/ace.jpg", { fade: 250 });
		}


		$('.section').addClass('hidden');
		$('#section-' + section).removeClass('hidden');
		event.preventDefault();
	});

	$('#writing-tabs a, #coding-tabs a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})
  	
});




