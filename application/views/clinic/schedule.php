<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="<?php echo base_url('assets/fullcalendar.min.css'); ?>" rel='stylesheet' />
    
    <script src="<?php echo base_url('assets/moment.min.js'); ?>"></script>
    
    <link href="<?php echo base_url('assets/fullcalendar.print.min.css'); ?>" rel='stylesheet' media='print' />
    <link href="<?php echo base_url('assets/jquery-ui.css'); ?>" rel='stylesheet' />
    <script src="<?php echo base_url('assets/fullcalendar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/theme-chooser.js'); ?>"></script>
    
    
    <script>
     var base_url="<?php echo base_url();?>"
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
        #top,
        #calendar.fc-unthemed {
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        }
        #top {
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            font-size: 12px;
            color: #000;
        }
        #top .selector {
            display: inline-block;
            margin-right: 10px;
        }
        #top select {
            font: inherit; /* mock what Boostrap does, don't compete  */
        }

        .left { float: left }
        .right { float: right }
        .clear { clear: both }

        #calendar {
            margin-top: 50px;
            max-width: 1000px;
        }
        
        .btn-default {background-color: #AED6F1; color: #000; border-color: #2980B9;}
        .btn-default:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
        .btn-default:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
        .btn-default.active {background-color: #3498DB; color: white;}
        .btn-default.active:hover {background-color: #3498DB; color: white;}
        .btn-default.active:focus {background-color: #3498DB; color: white;}
		
		.fc-prev-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
		.fc-prev-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-prev-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-next-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
		.fc-next-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-next-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-today-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
		.fc-today-button.disabled {background-color: #AED6F1; color: #000; border-color: #2980B9;}
		.fc-today-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-today-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		
		.fc-month-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
        .fc-month-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
        .fc-month-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-month-button.active {background-color: #3498DB; color: white;}
        .fc-month-button.active:hover {background-color: #3498DB; color: white;}
        .fc-month-button.active:focus {background-color: #3498DB; color: white;}
		
		.fc-agendaWeek-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
        .fc-agendaWeek-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
        .fc-agendaWeek-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-agendaWeek-button.active {background-color: #3498DB; color: white;}
        .fc-agendaWeek-button.active:hover {background-color: #3498DB; color: white;}
        .fc-agendaWeek-button.active:focus {background-color: #3498DB; color: white;}
		
		.fc-agendaDay-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
        .fc-agendaDay-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
        .fc-agendaDay-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-agendaDay-button.active {background-color: #3498DB; color: white;}
        .fc-agendaDay-button.active:hover {background-color: #3498DB; color: white;}
        .fc-agendaDay-button.active:focus {background-color: #3498DB; color: white;}
		
		.fc-listWeek-button {background-color: #AED6F1; color: #000; border-color: #2980B9;}
        .fc-listWeek-button:hover {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
        .fc-listWeek-button:focus {background-color: #D6EAF8; color: #000; border-color: #2980B9;}
		.fc-listWeek-button.active {background-color: #3498DB; color: white;}
        .fc-listWeek-button.active:hover {background-color: #3498DB; color: white;}
        .fc-listWeek-button.active:focus {background-color: #3498DB; color: white;}
		
        .fc-center { font-family: Poppins; color: #2980B9;}
        .fc-day-header {color:#2980B9; background-color: #F2F4F4;}
        th.fc-week-number {color:#2980B9; background-color: #F2F4F4;}
        .fc-day-top {font-weight: bold;}
        
    </style>
    

    
    
</head>
<body style=""> 
    <div class="wrapper ">
    <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a class="simple-text logo-mini">
                    <img src="<?php echo base_url('assets/img/logo.png');?>">
                </a>
                <a class="simple-text logo-normal">
                    Deloso Vet Clinic
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url('vetclinic'); ?>">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php
                    if($_SESSION['isDoctor']==0){
                        echo '<li>
                            <a href="'.base_url('vetclinic/billing').'">
                                <i class="now-ui-icons business_badge"></i>
                                <p>Billing
                                <span class="badge1" data-badge="'.$record_dat['bills'].'" style="background-color: red;"></span></p>
                            </a>
                        </li>';
                    }
                    ?>
                    <li>
                        <a href="<?php echo base_url('vetclinic/records'); ?>">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Records</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('vetclinic/Schedule'); ?>">
                            <i class="now-ui-icons ui-1_calendar-60"></i>
                            <p>Schedule</p>
                        </a>
                    </li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed">
                            <i class="now-ui-icons business_money-coins"></i>
                            <p>Sales</p>
                        </a>
                            <li>
                            <div id="subPages" class="collapse">
                                <ul class="nav">
                                    <li><a href="<?php echo base_url('vetclinic/sales'); ?>" class=""><i class="now-ui-icons business_chart-bar-32"></i>Sales Chart</a></li>
                                    <li><a href="<?php echo base_url('vetclinic/salesreport'); ?>" class=""><i class="now-ui-icons files_paper"></i>Sales Report</a></li>
                                </ul>
                            </div>
                        </li>
                    </li>
                    <li>
                        <a href="#subPages2" data-toggle="collapse" class="collapsed">
                            <i class="now-ui-icons shopping_basket"></i>
                            <p>Inventory</p>
                        </a>
                            <li>
                            <div id="subPages2" class="collapse ">
                                <ul class="nav">
                                    <li><a href="<?php echo base_url('vetclinic/inventory'); ?>" class=""><i class="now-ui-icons shopping_box"></i>Stocks</a></li>
                                    <li><a href="<?php echo base_url('vetclinic/history'); ?>" class=""><i class="now-ui-icons arrows-1_refresh-69"></i>History</a></li>
                                </ul>
                            </div>
                        </li>
                    </li>
                    <li>
                        <a href="<?php echo base_url('vetclinic/services'); ?>">
                            <i class="now-ui-icons education_glasses"></i>
                            <p>Services</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="main-panel">
        <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                                    <a class="dropdown-item" href="<?php echo base_url('vetclinic/accountsettings'); ?>">
                                        Account Settings
                                     </a>
                                    <a class="dropdown-item" href="<?php echo base_url('vetclinic/adduser'); ?>">
                                        Add New User
                                     </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=($record_dat['notif']!=0?'<span class="badge1" data-badge="'.$record_dat['notif'].'" style="background-color: red;"></span>':'')?>
                                    <i class="now-ui-icons ui-1_bell-53"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <?php
                                if($record_dat['notif']!=0){
                                    if(isset($record_dat['events'])){
                                        $i=1;
                                        foreach($record_dat['events'] as $e){
                                            echo '  
                                                    <a class="dropdown-item" href="/veterinaryv2/vetclinic/schedule">
                                                    Event no.'.$i.': '.$e['title'].', Desc:'.$e['description'].'
                                                    </a>
                                                ';
                                            $i++;
                                        }
                                    }

                                    if(isset($record_dat['items'])){
                                        foreach($record_dat['items'] as $item){
                                            echo '  
                                                    <a class="dropdown-item" href="/veterinaryv2/vetclinic/inventory" >
                                                    Item #'.$item['itemid'].': '.$item['item_desc'].' has 0 quantity left!
                                                    </a>
                                                ';

                                        }
                                    }
                                }


                                    else {





                                            echo    '<a class="dropdown-item">No new notification</a>


                                            ';
                                    }

                                ?>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                    <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
                                        Logout
                                     </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Schedule</h2>
                            </div>
                            <div class="card-body">
    <div id='calendar'></div>

    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
					<h4 class="modal-title text-center" id="myModalLabel" style="font-size:25px; font-weight:bold; margin-left:10%;">View/Update Calendar Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(site_url("vetclinic/edit_event"), array("class" => "form-horizontal")) ?>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Title</label>
                        <div class="col-md-8 ui-front">
                            <input type="text" class="form-control" name="name" value="" id="name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Description</label>
                        <div class="col-md-8 ui-front">
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>
                    <div class="form-group ">
                            <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                            <div class="col-md-8">
                                <input type="text " class="form-control" name="start_date" id="start_date" disabled>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">End Date</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="end_date" id="end_date" disabled>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                        <div class="col-md-8">
                            <input type="checkbox" name="delete" value="1">
                        </div>
                    </div>
                    <input type="hidden" name="eventid" id="event_id" value="0" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update Event">
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- add event modal -->

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header edit" style="background-color:rgba(128, 191, 255,0.9);">
					<h3 class="modal-title text-center" id="myModalLabel" style="font-size:25px; font-weight:bold; margin-left: 35%;">ADD EVENT</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body" >
                    <?php echo form_open(site_url("vetclinic/add_event"), array("class" => "form-horizontal")) ?>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Event Title:</label>
                        <div class="col-md-8 ui-front">
                            <input type="text" class="form-control" name="name" value="" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Description:</label>
                        <div class="col-md-8 ui-front">
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>
                    <input type="hidden" name="eventid" id="event_id" value="0" />
                    <input type="hidden" name="start" id="start"  />
                    <input type="hidden" name="end" id="end"  />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update Event">
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

</body>
<script>

        $(document).ready(function() {

            initThemeChooser({

                init: function(themeSystem) {
                    $('#calendar').fullCalendar({
                        themeSystem: 'bootstrap4',
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay,listWeek'
                        },
                        views: {
                            listDay: { buttonText: 'list day' },
                            listWeek: { buttonText: 'list week' }
                        },
                        weekNumbers: true,
                        navLinks: true, // can click day/week names to navigate views
                        editable: true,
                        droppable: true,
                        eventLimit: true, // allow "more" link when too many events
                        eventSources: [
                        {
                            events: function(start, end, timezone, callback) {
                                $.ajax({
                                    url: '<?php echo base_url() ?>vetclinic/get_events',
                                    dataType: 'json',
                                    data: {                
                                        start: start.unix(),
                                        end: end.unix()
                                    },
                                    success: function(msg) {
                                        var events = msg.events;
                                        callback(events);
                                    }
                                });
                           }
                        },
                        ],//end of eventSources
                        eventClick: function(event, jsEvent, view) {
                              $('#name').val(event.title);
                              $('#description').val(event.description);
                              $('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
                              if(event.end) {
                                $('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
                              } else {
                                $('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
                              }
                              $('#event_id').val(event.id);
                              $('#editModal').modal();
                        },
                        dayClick: function(date, jsEvent, view) {
							if(date.isSameOrAfter(moment())){
								var start = date.format();
								var view = view.name;
								/*alert(start);*/
								$('#start').val(start);
								$('#end').val(start);
								$('#addModal').modal();
							}
					    },
                        eventResize: function(event, delta, revertFunc) {
                            console.log(event);
                            var title = event.title;
                            var end = event.end.format();
                            var start = event.start.format();
                            $.ajax({
                                url: '<?php echo base_url() ?>vetclinic/resetdate',
                                // data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
                                type: 'POST',
                                dataType: 'json',
                                data:{
                                    title:title,
                                    start:start,
                                    end:end,
                                    eventid:event.id
                                },
                                success: function(response){
                                    if(response.status != 'success')                            
                                    revertFunc();
                                },
                                error: function(e){                     
                                    revertFunc();
                                    alert('Error processing your request: '+e.responseText);
                                }
                            });
                        },
                        eventDrop: function(event, delta, revertFunc) {
                            var title = event.title;
                            var start = event.start.format();
                            var end = (event.end == null) ? start : event.end.format();
                            $.ajax({
                                url: '<?php echo base_url() ?>vetclinic/drop',
                                type:'POST',
                                dataType:'json',
                                data:{
                                    title:title,
                                    start:start,
                                    end:end,
                                    eventid:event.id
                                },
                                success: function(response){
                                    if(response.status != 'success')                            
                                    revertFunc();
                                },
                                error: function(e){                     
                                    revertFunc();
                                    alert('Error processing your request: '+e.responseText);
                                }
                                            
                                        
                            });//end of ajax in eventDrop


                        },//end of event drop function

                        //event resize

                        

                    });//end of calendar
                },//end of init function

                change: function(themeSystem) {
                    $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
                }

            });

        });

    </script>
</html>