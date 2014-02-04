$(document).ready(function(){
   $(".group").click(function(){

   });

   $('#calendar').fullCalendar({   

   });

   var top = $('#calendar').offset().top - parseFloat($('#calendar').css('marginTop').replace(/auto/, 0));
   $(window).scroll(function (event) {
   // what the y position of the scroll is
      var y = $(this).scrollTop();

      // whether that's below the form
      if (y >= top) {
      // if so, ad the fixed class
      $('#calendar').addClass('fixed');
      } else {
      // otherwise remove it
      $('#calendar').removeClass('fixed');
   }
   });

   var changeTooltipPosition = function(event) {
      var tooltipX = event.pageX - 8;
      var tooltipY = event.pageY + 8;
      $('div.tooltip').css({top: tooltipY, left: tooltipX});
   };

   var showTooltip = function(event) {
      $('div.tooltip').remove();
      $('<div class="tooltip">Click to leave this group</div>')
      .appendTo('body');
      changeTooltipPosition(event);
   };

   var hideTooltip = function() {
      $('div.tooltip').remove();
   };

   $(".mygroup").bind({
      mousemove : changeTooltipPosition,
      mouseenter : showTooltip,
      mouseleave: hideTooltip
   });

   $( document ).ajaxStop( function() {
    $(".mygroup").bind({
      mousemove : changeTooltipPosition,
      mouseenter : showTooltip,
      mouseleave: hideTooltip
   });
   });

   

   $(document).on("click", ".mygroup", function(){
      var sure = confirm("Are you sure you want to leave this group?");
      if (sure == true)
      {
         var groupID = $(this).attr('class').split(' ').pop();
         $.ajax({
            type: "POST",
            url: "handlers/leaveGroup.php",
            data: { id: groupID },
            success: function(result)
            {
               $('.dashboard-your-groups').html(result);

            }
         }) 
      } 
   });
});

