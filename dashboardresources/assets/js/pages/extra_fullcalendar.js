






function todayDate(){
    var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;

    return output;
}



$(function() {


    // Add events
    // ------------------------------

    // Default events
    var events = [
        {
            title: 'Ok',
            start: '2020-04-07',
            end: '2020-04-10'
        },
        {
            title: 'Ok',
            start: '2020-04-20',
            end: '2020-04-30'

        }
    ];


    // Event background colors
    var eventBackgroundColors = [
        { color: '#DCEDC8'}
    ];


    // Agenda view
    $('.fullcalendar-agenda').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'Month'
        },
        defaultDate: todayDate(),
        defaultView: 'month',
        editable: true,
        events: events
    });



  
});
