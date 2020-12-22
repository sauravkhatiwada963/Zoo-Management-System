/* ------------------------------------------------------------------------------
*
*  # Fullcalendar time and language options
*
*  Specific JS code additions for extra_fullcalendar_formats.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Add events
    // ------------------------------

    // Default events
    var events = [];



    // Date formats
    // ------------------------------

    $('.fullcalendar-formats').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        titleFormat: {
            month: 'LL', // September 2009
            week: "MMM Do YY", // Sep 13 2009
            day: 'dddd'  // September 8
        },
        columnFormat: {
            month: 'dddd', // January
            week: 'ddd D', // Mon 7
            day: 'dddd' // Monday
        },
        timeFormat: 'h(:mm) a', // uppercase H for 24-hour clock
        defaultDate: '2014-11-12',
        editable: true,
        events: events
    });



    // Internationalization
    // ------------------------------

    // Set default language
    var currentLangCode = 'en';


    // Build the language selector's options
    $.each($.fullCalendar.langs, function(langCode) {
        $('#lang-selector').append(
            $('<option/>')
            .attr('value', langCode)
            .prop('selected', langCode == currentLangCode)
            .text(langCode)
        );
    });


    // Re-render the calendar when the selected option changes
    $('#lang-selector').on('change', function() {
        if (this.value) {
            currentLangCode = this.value;
            $('.fullcalendar-languages').fullCalendar('destroy');
            renderCalendar();
        }
    });


    // Render calendar
    renderCalendar();
    function renderCalendar() {
        $('.fullcalendar-languages').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2014-11-12',
            lang: currentLangCode,
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            editable: true,
            events: [
                
            ]
        });
    }


    // We're using Select2 for language select
    $('.select').select2({
        width: 100,
        minimumResultsForSearch: '-1',
        dropdownCssClass: 'bg-slate-700'
    });
    
});
