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
                    <li class="active">
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
                        <a class="navbar-brand" >Yearly Sales</a>
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
                                // if($record_dat['notif']!=0){
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
                                // }


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
            <!-- End Navbar -->
            <div class="panel-header panel-header-lg">
                <canvas id="bigDashboardChart"></canvas>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category" style="color:black; text-align:center; font-weight:bold">Today's Sales from Items(Php)</h5>
                            </div>
                            <div class="card-body1">
                                <?php
                                if($sales_dat['items']!=0){
								$percent=$sales_dat['items']-$sales_dat['items2'];

								$newper=$percent/$sales_dat['items'];
								$final=$newper*100;
                                echo '
                                    <div style="font-size: 30px; text-align: center;">'.number_format($sales_dat['items'],2,'.',',').'</div>
                                ';
                                ?>
								<span style="font-size: 25px; color: <?php 
								$percent=$sales_dat['items']-$sales_dat['items2'];
								$newper=$percent/$sales_dat['items'];
								$final=$newper*100;
								echo
								($final < 0 ? '#FF0000' : '#00FF00'); ?>">&nbsp;&nbsp;&nbsp;<?php echo number_format($final,2,'.',',');}?>%</span>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                </br>
                                    <?=isset($final)?'<i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated':'<h7>No sales yet</h7>'?>                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category" style="color:black; text-align:center; font-weight:bold">Todays' Income From Visits(Php)</h5>
                            </div>
                            <div class="card-body1">
                                <?php
                                if($sales_dat['visits']!=0){
								$percent2=$sales_dat['visits']-$sales_dat['visits2'];
								$newper2=$percent2/$sales_dat['visits'];
								$final2=$newper2*100;
                                echo '
                                    <div style="font-size: 30px; text-align: center;">'.number_format($sales_dat['visits'],2,'.',',').'</div>
                                ';}
                                ?>
								<span style="font-size: 25px; color: <?php 

                                if($sales_dat['visits']!=0){
								$percent2=$sales_dat['visits']-$sales_dat['visits2'];
								$newper2=$percent2/$sales_dat['visits'];
								$final2=$newper2*100;
								echo
								($final2 < 0 ? '#FF0000' : '#00FF00'); ?>">&nbsp;&nbsp;&nbsp;<?php echo number_format($final2,2,'.',','); }?>%</span>

                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                </br>
                                    <?=isset($final2)?'<i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated':'<h7>No visits yet</h7>'?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category" style="color:black; text-align:center; font-weight:bold">Total of Patients Served</h5>
                            </div>
                            <div class="card-body1">
                                <?php
                                echo '
                                    <div style="font-size: 55px; font-weight: bold; text-align: center;">'.$sales_dat['patients'].'&nbsp;<i class="fas fa-user-md"></i></div>
                                ';
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons business_briefcase-24"></i> Sinced the clinic opened
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category" style="color:black; text-align:center; font-weight:bold">Item's Available in Stock</h5>
                            </div>
                            <div class="card-body1">
                                <?php
                                echo '
                                    <div style="font-size: 55px; font-weight: bold; text-align: center;">'.count($sales_dat['no_ofItems']).'&nbsp;<i class="fas fa-medkit"></i></div>
                                ';
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category" style="color:black; text-align:center; font-weight:bold">Out of Stock Items</h5>
                            </div>
                            <div class="card-body1">
                                <?php
                                echo '
                                    <div style="font-size: 55px; font-weight: bold; text-align: center;">'.$record_dat['zero'].'&nbsp;<i class="fas fa-exclamation-triangle"></i></div>
                                ';
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category" style="color:black; text-align:center; font-weight:bold">TODAY</h5>
                            </div>
                            <div class="card-body1">
                                    <div id="time"></div>
                                    <div id="date"></div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                </div>
                            </div>
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
<script>
    window.onload = setInterval(clock,1000);

    function clock()
    {
      var d = new Date();
      
      var date = d.getDate();
      
      var month = d.getMonth();
      var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
      month=montharr[month];
      
      var year = d.getFullYear();
      
      var day = d.getDay();
      var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
      day=dayarr[day];
      
      var hour =d.getHours();
      var min = d.getMinutes();
      var sec = d.getSeconds();
    
      document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
      document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }


    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
       initDashboardPageCharts();
    });

    function initDashboardPageCharts(){
        $.ajax({
            url: 'vetclinic/ajax_yearly',
            success: function(data) {
                var obj = JSON.parse(data);
                            
                            var date = [];
                            var total_cost = [];
                            var visitdate = [];
                            var visit_cost = [];
          chartColor = "#FFFFFF";

                            for(var i in obj.dates){
                                date.push("Date: " + obj.dates[i]);
                                visitdate.push("Date: " + obj.dates[i]);
                            }

                            for(var n in obj.sales1){
                                visit_cost.push(obj.sales1[n]);
                                total_cost.push(obj.sales2[n]);
                            }
      // General configuration for the charts with Line gradientStroke
      gradientChartOptionsConfiguration = {
          maintainAspectRatio: false,
          legend: {
              display: false
          },
          tooltips: {
            bodySpacing: 4,
            mode:"nearest",
            intersect: 0,
            position:"nearest",
            xPadding:10,
            yPadding:10,
            caretPadding:10
          },
          responsive: 1,
          scales: {
              yAxes: [{
                display:0,
                gridLines:0,
                ticks: {
                    display: false
                },
                gridLines: {
                    zeroLineColor: "transparent",
                    drawTicks: false,
                    display: false,
                    drawBorder: false
                }
              }],
              xAxes: [{
                display:0,
                gridLines:0,
                ticks: {
                    display: false
                },
                gridLines: {
                  zeroLineColor: "transparent",
                  drawTicks: false,
                  display: false,
                  drawBorder: false
                }
              }]
          },
          layout:{
            padding:{left:0,right:0,top:15,bottom:15}
          }
      };

      gradientChartOptionsConfigurationWithNumbersAndGrid = {
          maintainAspectRatio: false,
          legend: {
              display: false
          },
          tooltips: {
            bodySpacing: 4,
            mode:"nearest",
            intersect: 0,
            position:"nearest",
            xPadding:10,
            yPadding:10,
            caretPadding:10
          },
          responsive: true,
          scales: {
              yAxes: [{
                gridLines:0,
                gridLines: {
                    zeroLineColor: "transparent",
                    drawBorder: false
                }
              }],
              xAxes: [{
                display:0,
                gridLines:0,
                ticks: {
                    display: false
                },
                gridLines: {
                  zeroLineColor: "transparent",
                  drawTicks: false,
                  display: false,
                  drawBorder: false
                }
              }]
          },
          layout:{
            padding:{left:0,right:0,top:15,bottom:15}
          }
      };

      var ctx = document.getElementById('bigDashboardChart').getContext("2d");

      var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
      gradientStroke.addColorStop(0, '#80b6f4');
      gradientStroke.addColorStop(1, chartColor);

      var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
      gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
      gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
              datasets: [
              {
                  label: "Items",
                  borderColor: chartColor,
                  pointBorderColor: chartColor,
                  pointBackgroundColor: "#1e3d60",
                  pointHoverBackgroundColor: "#1e3d60",
                  pointHoverBorderColor: chartColor,    
                  pointBorderWidth: 1,
                  pointHoverRadius: 7,
                  pointHoverBorderWidth: 2,
                  pointRadius: 5,
                  fill: true,
                  backgroundColor: gradientFill,
                  borderWidth: 2,
                  data: total_cost
              },
              {
                  label: "Visits",
                  borderColor: chartColor,
                  pointBorderColor: chartColor,
                  pointBackgroundColor: "#1f611f",
                  pointHoverBackgroundColor: "#1f611f",
                  pointHoverBorderColor: chartColor,
                  pointBorderWidth: 1,
                  pointHoverRadius: 7,
                  pointHoverBorderWidth: 2,
                  pointRadius: 5,
                  fill: true,
                  backgroundColor: gradientFill,
                  borderWidth: 2,
                  data: visit_cost
              }

              ]
          },
          options: {
              layout: {
                  padding: {
                      left: 20,
                      right: 20,
                      top: 0,
                      bottom: 0
                  }
              },
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: '#fff',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
              },
              legend: {
                  position: "bottom",
                  fillStyle: "#FFF",
                  display: false
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          fontColor: "rgba(255,255,255,0.4)",
                          fontStyle: "bold",
                          beginAtZero: true,
                          maxTicksLimit: 5,
                          padding: 10
                      },
                      gridLines: {
                          drawTicks: true,
                          drawBorder: false,
                          display: true,
                          color: "rgba(255,255,255,0.1)",
                          zeroLineColor: "transparent"
                      }

                  }],
                  xAxes: [{
                      gridLines: {
                          zeroLineColor: "transparent",
                          display: false,

                      },
                      ticks: {
                          padding: 10,
                          fontColor: "rgba(255,255,255,0.4)",
                          fontStyle: "bold"
                      }
                  }]
              }
          }
      });
    }
        });
    }   
</script>