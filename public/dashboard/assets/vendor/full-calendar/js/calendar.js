$(function() {
    "use strict"; 

    $(document).ready(function() {

        var calendar = $('#calendar1').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            lang:'fr',
            defaultDate: now,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: data
        });

        $('#goToLastEvent').click(function(){
            calendar.fullCalendar( 'gotoDate', moment($('#events').val()))
        });

    });
  
   


 });
