<head>
<!--  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>-->
<!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/datepicker.css"); ?>">
  <link rel="stylesheet" href="/resources/demos/style.css">
<!--
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
  <script src="<?php echo base_url("assets/js/jquery-1.12.4.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script>

</head>

<style type="text/css">
    #chart-container {
        width: 100%;
        height: auto;	
        margin-top:5px;
    }
    .button {
        margin-top:25px;
        padding: 5px 10px;
        font-size: 15px;
        font-family: Poppins;
        font-weight: light;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: white;	
        background-color: #4d94ff;
        border: none;
        border-radius: 5px;
        box-shadow: 0 5px #999;
    }
    .button:hover {background-color: #003d99}
    .button:active {
        background-color: #003d99;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
    input[type='text']{
        background: url(<?php echo base_url('assets/images/calendar.png');?>) no-repeat;
        background-position: 97% 3px;
        padding-left: 10px;
        cursor: pointer;
    }
    .spanhidden{
        color:#ff0000;
        padding:5px 0px;
        position: absolute;
        display: none;
    }
    #enddate:hover + .spanhidden {
        display: block;
    }
</style>

<body>
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
                    <li>
                        <a href="<?php echo base_url('vetclinic/records'); ?>">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Records</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('vetclinic/schedule'); ?>">
                            <i class="now-ui-icons ui-1_calendar-60"></i>
                            <p>Schedule</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#subPages" data-toggle="collapse" class="collapsed">
                            <i class="now-ui-icons business_money-coins"></i>
                            <p>Sales</p>
                        </a>
                            <li>
                            <div id="subPages" class="collapse">
                                <ul class="nav">
                                    <li class="active"><a href="<?php echo base_url('vetclinic/sales'); ?>" class=""><i class="now-ui-icons business_chart-bar-32"></i>Sales Chart</a></li>
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
                            <div id="subPages2" class="collapse">
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
									 <a class="dropdown-item" data-toggle="modal" data-target="#adddoctor">Add Doctor </a>
									 <a class="dropdown-item" data-toggle="modal" data-target="#addbreed">Add Breed </a>
									 <a class="dropdown-item" data-toggle="modal" data-target="#addsupplier">Add Supplier </a>
									 <a class="dropdown-item" data-toggle="modal" data-target="#additemtype">Add Item Type </a>
									 <a class="dropdown-item" data-toggle="modal" data-target="#addidu">Add Item Distribution Unit </a>
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
                                <h2 class="card-title">Sales</h2>
                            </div>
                            <br /><br />
                            <div class="card-body">
    <div class="btn-group" style="margin-left:50px;">
	    <button type="button" class="button" onclick="realTimeSalesChart()">Weekly</button>
	    <button type="button" class="button" onclick="monthlySalesChart()">Monthly</button>
	    <button type="button" class="button" onclick="yearlySalesChart()">Yearly</button>
	  </div>

	<div id="chart-container" style="margin-top:-40px;">
			<canvas id="mycanvas"></canvas>
	</div>
	    <!-- <form method="POST" action="<?php echo base_url('vetclinic/sales');?>" > -->
		<div id="chart-date" class="row salesDate" >
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-3 col-sm-3">
				<label style="font-size:17px;">Start date:</label><input type="text" class="form-control" id="startdate" name="startdate" />
            </div>
            <div class="col-md-3 col-sm-3">
				<label style="font-size:17px;">End date:</label><input type="text" class="form-control" id="enddate" name="enddate" disabled="disabled" />
                <div id="toShow" class="spanhidden"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Please enter start date</div>
            </div>            
            <div class="col-md-2 col-sm-2">
                <button type="button" onclick="realTimeSalesChart()" class="button">Save</button>
            </div>
            <div class="col-md-2 col-sm-2"></div>
		</div>
			</div>

    <!--     </form> -->
</div>
</div>
</div>
</div>
</div>
</div>

<!--  Add Supplier Modal -->
	  <div class="modal fade" id="addsupplier" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content -->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title" style="font-size:25px; font-weight:bold;  margin-left:30%;">ADD SUPPLIER</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
				  <form class="form-horizontal" action="<?php echo base_url('vetclinic/addSupplier'); ?>" method="post">
					
					<br />
					<div class="form-group">
					  <label  for="supplier_name">Supplier Name:</label>
						<div >
							<input type="text" class="form-control" id="supplier_name"  name="supplier_name">
						</div>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-primary" name="add">Save</button>
				  </form>
			</div>
		  </div>
		  
		</div>
	  </div>
	  <!-- End of Add Supplier Modal -->
	
	
	<!--  Add Item Type Modal -->
	  <div class="modal fade" id="additemtype" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content -->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title" style="font-size:25px; font-weight:bold;  margin-left:30%;">ADD ITEM TYPE</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
				  <form class="form-horizontal" action="<?php echo base_url('vetclinic/addItemType'); ?>" method="post">
					
					<br />
					<div class="form-group">
					  <label  for="itemtype">Item Type:</label>
						<div >
							<input type="text" class="form-control" id="itemtype"  name="itemtype">
						</div>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-primary" name="add">Save</button>
				  </form>
			</div>
		  </div>
		  
		</div>
	  </div>
	  <!-- End of Item Type Modal -->
	  
	
	<!--  Add Item Distribution Unit Modal -->
	  <div class="modal fade" id="addidu" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content -->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title" style="font-size:25px; font-weight:bold;  margin-left:8%;">ADD ITEM DISTRIBUTION UNIT</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
				  <form class="form-horizontal" action="<?php echo base_url('vetclinic/addDistUnit'); ?>" method="post">
					
					<br />
					<div class="form-group">
					  <label  for="dist_unit">New Distribution Unit:</label>
						<div >
							<input type="text" class="form-control" id="dist_unit"  name="dist_unit">
						</div>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-primary" name="add">Save</button>
				  </form>
			</div>
		  </div>
		  
		</div>
	  </div>
	  <!-- End of Add Item Distribution Unit Modal -->
	  
	
	<!--  Add Doctor Modal -->
	  <div class="modal fade" id="adddoctor" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content -->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title" style="font-size:25px; font-weight:bold;  margin-left:30%;">ADD A DOCTOR</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
				  <form class="form-horizontal" action="<?php echo base_url('vetclinic/addDoctor'); ?>" method="post">
					
					<br />
					<div class="form-group">
					  <label  for="vetname">Doctor's Name:</label>
						<div >
							<input type="text" class="form-control" id="vetname"  name="vetname">
						</div>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-primary" name="add">Save</button>
				  </form>
			</div>
		  </div>
		  
		</div>
	  </div>
	  <!-- End of Add Doctor Modal -->
	
	
	<!--  Add Breed Modal -->
	  <div class="modal fade" id="addbreed" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content -->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title" style="font-size:25px; font-weight:bold;  margin-left:33%;">ADD BREED</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
				  <form class="form-horizontal" action="<?php echo base_url('vetclinic/addBreed'); ?>" method="post">
					
                  <div class="form-group">
					  <label  for="serv_type">Species:</label>
					  <div >          
							<select class="form-control" id="serv_type" name="species">
								<option value="dog">Dog</option>
								<option value="cat">Cat</option>							
							</select>
					  </div>
					</div>

					<br />
					<div class="form-group">
					  <label  for="breed">New Breed:</label>
						<div >
							<input type="text" class="form-control" id="breed"  name="breed">
						</div>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  <button type="submit" class="btn btn-primary" name="add">Save</button>
				  </form>
			</div>
		  </div>
		  
		</div>
	  </div>
	  <!-- End of Add Breed Modal -->
	  
</body>


<script type="text/javascript">
    
        $(document).ready(function() { // js to enable enddate input field once startdate is may laman na
            $('#startdate').change(function() {
                var empty = false;
                $('#startdate').each(function() {
                    if ($(this).val().length == 0) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('#enddate').attr('disabled', 'disabled');
                    $('#enddate').after('<div id="toShow" class="spanhidden"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Please enter start date</div>');
                } else {
                    $('#enddate').removeAttr('disabled');
                    $('#toShow').remove();
                }
            });
        });
    
		$(document).ready(function(){
			
		    $( "#startdate").datepicker(
		    	{
		    		dateFormat: 'yy-mm-dd',
		    		beforeShow: function(){
					    $("#startdate").datepicker("option", {
					      maxDate: $("#enddate").datepicker('getDate')
					    });
					  }
		    	}
		    );
		    $("#enddate").datepicker(
		    	{
				  dateFormat: 'yy-mm-dd',
				  beforeShow: function(){
				  	test = $("#startdate").datepicker('getDate');
				    testm = new Date(test.getTime());
				    testm.setDate(testm.getDate() + 1);
				    $("#enddate").datepicker("option", {
				      minDate: testm
				    });
				  }
			});
			
		    realTimeSalesChart();
  		} );

function realTimeSalesChart(){
	$('#mycanvas').remove();
	$('#chart-container').append('<canvas id="mycanvas"></canvas>');
	$.ajax({
			        type: 'POST',
			        url: 'filter_date',
			        data:{startDate :$("#startdate").val(),endDate:$("#enddate").val()},
				        success: function(data) {
				        	var obj = JSON.parse(data);
				        	console.log(obj);

				        	var date = [];
				        	var total_cost = [];

				        	var visitdate = [];
				        	var visit_cost = [];


				        	/*for(var i in obj.sales2){
				        		date.push("Date " + obj.sales2[i].date);
				        		total_cost.push(obj.sales2[i].total_cost);
				        	}

				        	for(var i in obj.sales1){
				        		visitdate.push("Date " + obj.sales1[i].visitdate);
				        		visit_cost.push(obj.sales1[i].visit_cost);
							}*/
							
							for(var i in obj.dates){
								date.push("Date: " + obj.dates[i]);
								visitdate.push("Date: " + obj.dates[i]);
							}

							for(var n in obj.sales1){
								visit_cost.push(obj.sales1[n]);
								total_cost.push(obj.sales2[n]);
							}

				        	var chartdata = {
								labels: date,
								datasets : [
									{
										label: 'ITEMS',
										backgroundColor: 'blue',
										borderColor: 'lightblue',
										hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
										hoverBorderColor: 'rgba(200, 200, 200, 1)',
										fill : false,
										lineTension : 0,
										pointRadius : 5,
										data: total_cost
									},
									{
										label: 'VISIT',
										backgroundColor: 'green',
										borderColor: 'lightgreen',
										hoverBackgroundColor: 'rgba(200, 600, 200, 1)',
										hoverBorderColor: 'rgba(200, 200, 200, 1)',
										fill : false,
										lineTension : 0,
										pointRadius : 5,
										data: visit_cost
									}

								]
							};

							var options = {
							title : {
								display : true,
								position : "top",
								fontSize : 45,
                                fontFamily : "Arvo",
								fontColor : "#2471A3"
							},
							legend : {
								display : true,
								position : "bottom",
								labels: {
					                // This more specific font property overrides the global property
					                fontSize : 25
					            }
							}
						};

							var ctx = $("#mycanvas");

							var barGraph = new Chart(ctx, {
								type: 'line',
								data: chartdata,
								options: options
							});   

				        }
				    });	
}

function monthlySalesChart(){
	var date = new Date();
	var fd = new Date(date.getFullYear(), date.getMonth(),2);
	var firstday = fd.toISOString().split('T')[0];
	var ld = new Date(date.getFullYear(), date.getMonth() + 1, 1);
	var lastday = ld.toISOString().split('T')[0];

	$('#mycanvas').remove();
	$('#chart-container').append('<canvas id="mycanvas"></canvas>');
	$.ajax({
			        type: 'POST',
			        url: 'filter_date',
			        data:{startDate :firstday,endDate:lastday},
				        success: function(data) {
				        	var obj = JSON.parse(data);
				        	var date = [];
				        	var total_cost = [];
				        	var visitdate = [];
				        	var visit_cost = [];


				        	/*for(var i in obj.sales2){
				        		date.push("Date " + obj.sales2[i].date);
				        		total_cost.push(obj.sales2[i].total_cost);
				        	}

				        	for(var i in obj.sales1){
				        		visitdate.push("Date " + obj.sales1[i].visitdate);
				        		visit_cost.push(obj.sales1[i].visit_cost);
							}*/
							
							for(var i in obj.dates){
								date.push("Date: " + obj.dates[i]);
								visitdate.push("Date: " + obj.dates[i]);
							}

							for(var n in obj.sales1){
								visit_cost.push(obj.sales1[n]);
								total_cost.push(obj.sales2[n]);
							}

				        	var chartdata = {
								labels: date,
								datasets : [
									{
										label: 'ITEMS',
										backgroundColor: 'blue',
										borderColor: 'lightblue',
										hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
										hoverBorderColor: 'rgba(200, 200, 200, 1)',
										fill : false,
										lineTension : 0,
										pointRadius : 5,
										data: total_cost
									},
									{
										label: 'VISIT',
										backgroundColor: 'green',
										borderColor: 'lightgreen',
										hoverBackgroundColor: 'rgba(200, 600, 200, 1)',
										hoverBorderColor: 'rgba(200, 200, 200, 1)',
										fill : false,
										lineTension : 0,
										pointRadius : 5,
										data: visit_cost
									}

								]
							};

							var options = {
							title : {
								display : true,
								position : "top",
								fontSize : 45,
                                fontFamily : "Arvo",
								fontColor : "#2471A3"
							},
							legend : {
								display : true,
								position : "bottom",
								labels: {
					                // This more specific font property overrides the global property
					                fontSize : 25
					            }
							}
						};

							var ctx = $("#mycanvas");

							var barGraph = new Chart(ctx, {
								type: 'line',
								data: chartdata,
								options: options
							});   

				        }
				    });	
}

	function yearlySalesChart(){
		console.log('test');
		$('#mycanvas').remove();
		$('#chart-container').append('<canvas id="mycanvas"></canvas>');
		$.ajax({
			url: 'ajax_yearly',
			success: function(data) {
							//console.log(data);
				        	var obj = JSON.parse(data);
							
				        	var date = [];
				        	var total_cost = [];
				        	var visitdate = [];
				        	var visit_cost = [];


				        	/*for(var i in obj.sales2){
				        		date.push("Date " + obj.sales2[i].date);
				        		total_cost.push(obj.sales2[i].total_cost);
				        	}

				        	for(var i in obj.sales1){
				        		visitdate.push("Date " + obj.sales1[i].visitdate);
				        		visit_cost.push(obj.sales1[i].visit_cost);
							}*/
							
							for(var i in obj.dates){
								date.push("Date: " + obj.dates[i]);
								visitdate.push("Date: " + obj.dates[i]);
							}

							for(var n in obj.sales1){
								visit_cost.push(obj.sales1[n]);
								total_cost.push(obj.sales2[n]);
							}

				        	var chartdata = {
								labels: date,
								datasets : [
									{
										label: 'ITEMS',
										backgroundColor: 'blue',
										borderColor: 'lightblue',
										hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
										hoverBorderColor: 'rgba(200, 200, 200, 1)',
										fill : false,
										lineTension : 0,
										pointRadius : 5,
										data: total_cost
									},
									{
										label: 'VISIT',
										backgroundColor: 'green',
										borderColor: 'lightgreen',
										hoverBackgroundColor: 'rgba(200, 600, 200, 1)',
										hoverBorderColor: 'rgba(200, 200, 200, 1)',
										fill : false,
										lineTension : 0,
										pointRadius : 5,
										data: visit_cost
									}

								]
							};

							var options = {
							title : {
								display : true,
								position : "top",
								fontSize : 45,
                                fontFamily : "Arvo",
								fontColor : "#2471A3"
							},
							legend : {
								display : true,
								position : "bottom",
								labels: {
					                // This more specific font property overrides the global property
					                fontSize : 25
					            }
							}
						};

							var ctx = $("#mycanvas");

							var barGraph = new Chart(ctx, {
								type: 'line',
								data: chartdata,
								options: options
							});   

				        }
		});
	}
</script>