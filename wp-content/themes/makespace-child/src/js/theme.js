(function($){
	
	var jobsPage = function(){
		
		var jobFilterLink = $('[data-action="job-filter"]');
		
		jobFilterLink.on('click', function(e){
			e.preventDefault();
			var target = $(this).attr('data-target');
		});
		
		var jobToggle = $('[data-action="job-toggle"]');
		
		jobToggle.on('click', function(){
			var job = $(this).parents('.inner');
			job.toggleClass('expand');
		});
		
	}

	$(document).ready(function(){
		jobsPage();
	});

})(jQuery);