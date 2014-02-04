

$(document).ready(function(){

	var changeTooltipPosition = function(event) {
	  var tooltipX = event.pageX - 8;
	  var tooltipY = event.pageY + 8;
	  $('div.tooltip').css({top: tooltipY, left: tooltipX});
	};
 
	var showTooltip = function(event) {
	  $('div.tooltip').remove();
	  $('<div class="tooltip">Click to join this group</div>')
            .appendTo('body');
	  changeTooltipPosition(event);
	};
 
	var hideTooltip = function() {
	   $('div.tooltip').remove();
	};
 
	$(".result").bind({
	   mousemove : changeTooltipPosition,
	   mouseenter : showTooltip,
	   mouseleave: hideTooltip
	});

	$( document ).ajaxStop( function() {
    $(".result").bind({
      mousemove : changeTooltipPosition,
      mouseenter : showTooltip,
      mouseleave: hideTooltip
   });
   });

	

	$(document).on("click", ".result", function(){
		var sure = confirm("Are you sure you want to join this group?");
		if (sure == true)
		{
			var groupID = $(this).attr('class').split(' ').pop();
			console.log(groupID);
			$.ajax({
				type: "POST",
				url: "handlers/groupJoin.php",
				data: { id: groupID },
				success: function(){
					window.location = 'dashboard.php';
				}
			})	
		}
	});

	$('#collegename').change(function() {

		var collegename = $(this).val();
		if(collegename != "")
		{
			$.ajax({
			type: "POST",
			url: "handlers/searchUpdate.php",
			data: { collegenameid: collegename },
			success: function(result){
				$('.find-results').html(result);

			}
			})	
		}
	});

	$('#coursename').change(function() {

		var coursename = $(this).val();
		if(coursename != "")
		{
			$.ajax({
			type: "POST",
			url: "handlers/searchUpdate.php",
			data: { coursenameid: coursename },
			success: function(result){
				$('.find-results').html(result);
				}
			})	
		}
		
	});

	$( "input[type=checkbox]" ).change(function() {
		
		var checkeddays = new Array();
		$("input:checked").each(function()
		{
			checkeddays.push($(this).val());

		});

		if(checkeddays.length != 0)
		{
			$.ajax({
				type: "POST",
				url: "handlers/searchUpdate.php",
				data: { checkeddaysid: JSON.stringify(checkeddays) },
				success: function(result){
					$('.find-results').html(result);
				}
			})
		}
	});

	$('#location').change(function() {

		var location = $(this).val();
		if(location != "")
		{
			$.ajax({
				type: "POST",
				url: "handlers/searchUpdate.php",
				data: { locationid: location },
				success: function(result){
					$('.find-results').html(result);
				}
			})
		}	
	});

	$('#time').change(function() {

		var time = $(this).val();
		if(time != "")
		{
			$.ajax({
				type: "POST",
				url: "handlers/searchUpdate.php",
				data: { timeid: time },
				success: function(result){
					$('.find-results').html(result);
				}
			})
		}	
	});
});