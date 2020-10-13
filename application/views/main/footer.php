    <!-- start: Javascript -->
    <script src="<?= base_url('assets/'); ?>primary/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/jquery.ui.min.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/bootstrap.min.js"></script>
    
    <script src="<?= base_url('assets/'); ?>dist/sweetalert2.all.min.js"></script>
    
    
    <!-- plugins -->
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/fullcalendar.min.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/jquery.nicescroll.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="<?= base_url('assets/'); ?>primary/js/plugins/chart.min.js"></script>
    
    <!-- fullCalendar 2.2.5 -->
    <script src="<?= base_url('assets/'); ?>pluginsadmin/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>pluginsadmin/fullcalendar/main.min.js"></script>
    <script src="<?= base_url('assets/'); ?>pluginsadmin/fullcalendar-daygrid/main.min.js"></script>
    <script src="<?= base_url('assets/'); ?>pluginsadmin/fullcalendar-timegrid/main.min.js"></script>
    <script src="<?= base_url('assets/'); ?>pluginsadmin/fullcalendar-interaction/main.min.js"></script>
    <script src="<?= base_url('assets/'); ?>pluginsadmin/fullcalendar-bootstrap/main.min.js"></script>
    
    <!-- custom -->
    <script src="<?= base_url('assets/'); ?>primary/js/main.js"></script>
    
    <script>
$(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            })

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
            console.log(eventEl);
            return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                    'background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                    'background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
        }
    });

    var calendar = new Calendar(calendarEl, {
        plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        'themeSystem': 'bootstrap',
        //Random default events
        events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor: '#f56954', //red
                allDay: true
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor: '#f39c12' //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#0073b7', //Blue
                borderColor: '#0073b7' //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor: '#00c0ef' //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor: '#00a65a' //Success (green)
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
            }
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
        })
    })
    $('#add-new-event').click(function(e) {
        e.preventDefault()
        //Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
            return
        }

        //Create events
        var event = $('<div />')
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event')
        event.html(val)
        $('#external-events').prepend(event)

        //Add draggable funtionality
        ini_events(event)

        //Remove event from text input
        $('#new-event').val('')
    })
})
    </script>
    
    <script type="text/javascript">
    (function(jQuery) {
        
        // start: Chart =============
        
        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {
            
            var tooltipEl = $('#chartjs-tooltip');
            
            if (!tooltip) {
                tooltipEl.css({
                    opacity: 0
                });
                return;
            }
            
            tooltipEl.removeClass('above below');
            tooltipEl.addClass(tooltip.yAlign);
            
            var innerHtml = '';
            if (undefined !== tooltip.labels && tooltip.labels.length) {
                for (var i = tooltip.labels.length - 1; i >= 0; i--) {
                    innerHtml += [
                        '<div class="chartjs-tooltip-section">',
                        '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[
                            i].fill + '"></span>',
                            '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
                            '</div>'
                            ].join('');
                        }
                        tooltipEl.html(innerHtml);
                    }
                    
                    tooltipEl.css({
                        opacity: 1,
                        left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
                        top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
                        fontFamily: tooltip.fontFamily,
                        fontSize: tooltip.fontSize,
                        fontStyle: tooltip.fontStyle
                    });
                };
                var randomScalingFactor = function() {
                    return Math.round(Math.random() * 100);
                };
                var lineChartData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(66,69,67,0.3)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [18, 9, 5, 7, 4.5, 4, 5, 4.5, 6, 5.6, 7.5]
                    }, {
                        label: "My Second dataset",
                        fillColor: "rgba(21,113,186,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [4, 7, 5, 7, 4.5, 4, 5, 4.5, 6, 5.6, 7.5]
                    }]
                };
                
                var doughnutData = [{
                    value: 300,
                    color: "#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 50,
                    color: "#1AD576",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#0F5E36",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }
                
            ];
            
            
            var doughnutData2 = [{
                value: 100,
                color: "#129352",
                highlight: "#15BA67",
                label: "Alfa"
            },
            {
                value: 250,
                color: "#FF6656",
                highlight: "#FF6656",
                label: "Beta"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#15BA67",
                label: "Gamma"
            },
            {
                value: 40,
                color: "#FD786A",
                highlight: "#15BA67",
                label: "Peta"
            },
            {
                value: 120,
                color: "#15A65D",
                highlight: "#15BA67",
                label: "X"
            }
            
        ];
        
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(21,186,103,0.4)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(21,186,103,0.2)",
                highlightStroke: "rgba(21,186,103,0.2)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(21,113,186,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(21,113,186,0.2)",
                highlightStroke: "rgba(21,113,186,0.2)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
            ]
        };
        
        window.onload = function() {
            var ctx = $(".doughnut-chart")[0].getContext("2d");
            window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
                responsive: true,
                showTooltips: true
            });
            
            var ctx2 = $(".line-chart")[0].getContext("2d");
            window.myLine = new Chart(ctx2).Line(lineChartData, {
                responsive: true,
                showTooltips: true,
                multiTooltipTemplate: "<%= value %>",
                maintainAspectRatio: false
            });
            
            var ctx3 = $(".bar-chart")[0].getContext("2d");
            window.myLine = new Chart(ctx3).Bar(barChartData, {
                responsive: true,
                showTooltips: true
            });
            
            var ctx4 = $(".doughnut-chart2")[0].getContext("2d");
            window.myDoughnut2 = new Chart(ctx4).Doughnut(doughnutData2, {
                responsive: true,
                showTooltips: true
            });
            
        };
        
        //  end:  Chart =============
        
        // start: Calendar =========
        $('.dashboard .calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            defaultDate: '2015-02-12',
            businessHours: true, // display business hours
            editable: true,
            events: [{
                title: 'Business Lunch',
                start: '2015-02-03T13:00:00',
                constraint: 'businessHours'
            },
            {
                title: 'Meeting',
                start: '2015-02-13T11:00:00',
                constraint: 'availableForMeeting', // defined below
                color: '#20C572'
            },
            {
                title: 'Conference',
                start: '2015-02-18',
                end: '2015-02-20'
            },
            {
                title: 'Party',
                start: '2015-02-29T20:00:00'
            },
            
            // areas where "Meeting" must be dropped
            {
                id: 'availableForMeeting',
                start: '2015-02-11T10:00:00',
                end: '2015-02-11T16:00:00',
                rendering: 'background'
            },
            {
                id: 'availableForMeeting',
                start: '2015-02-13T10:00:00',
                end: '2015-02-13T16:00:00',
                rendering: 'background'
            },
            
            // red areas where no events can be dropped
            {
                start: '2015-02-24',
                end: '2015-02-28',
                overlap: false,
                rendering: 'background',
                color: '#FF6656'
            },
            {
                start: '2015-02-06',
                end: '2015-02-08',
                overlap: true,
                rendering: 'background',
                color: '#FF6656'
            }
            ]
        });
        // end : Calendar==========
        
        // start: Maps============
        
        jQuery('.maps').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#fff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
        });
        
        // end: Maps==============
        
    })(jQuery);
    </script>
    <!-- end: Javascript -->
    </body>
    
    </html>