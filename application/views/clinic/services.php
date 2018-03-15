<!DOCTYPE html>
<html lang="en">

<body class="">
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
  <p>Billing<span class="badge1" data-badge="'.$record_dat['bills'].'" style="background-color: red;"></span></p>
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
                    <li class="active">
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
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Services Offered</h2>
								<div id="addserv">
									<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#addservicemodal">
									<span class="glyphicon glyphicon-plus"></span> Add Service</button>
								</div>
                            </div>
                            <div class="card-body">
<br/>
	<div class="container-fluid box">
	
<!--
<table class="table" id="mytable">
	<thead>
		<tr>
			<th>Service ID</th>
			<th>Description</th>
			<th style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody> 
		<tr> 
			<td style="width:400px;"><b>Grooming Services</b></td>
			<td></td><td></td><td></td>
		</tr>-->
			<?php 
			foreach($data['grooming'] as $s){
				echo '
				<div class="col-lg-3 col-md-3 col-sm-3 boxed">
					<ul> Grooming </ul> <hr />
					<li> '.$s['desc'].' </li>
					<li> '.$s['id'].' </li> <hr />
					<li> <p>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#updateservicemodal" onclick="data('.$s['id'].')">Edit</button>
						<a href="'.base_url('vetclinic/services/?id='.$s['id']).'" role="button" class="btn btn-danger btn-md" >Delete</a></p>
					</li>
				</div>
				
				
				 ';}
			?>
		<!--<tr>
			<td><b>Treatment Services</b></td>
			<td></td><td></td><td></td>
		</tr> -->
				<?php 
			foreach($data['treatment'] as $s){
				echo '
				<div class="col-lg-3 col-md-3 col-sm-3 boxed2">
					<ul> Treatment </ul> <hr>
					<li> '.$s['desc'].' </li>
					<li> '.$s['id'].' </li> <hr>
					<li> <p>
						<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#updateservicemodal" onclick="data('.$s['id'].')">Edit</button>
						<a href="'.base_url('vetclinic/services/?id='.$s['id']).'" role="button" class="btn btn-danger btn-md" >Delete</a></p>
					</li>
				</div>
				 ';}
			?>
		
		</div>
<!--
	</tbody>
</table>-->
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--  Add Service Modal -->
	  <div class="modal fade" id="addservicemodal" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content -->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title" style="font-size:25px; font-weight:bold;  margin-left:33%;">ADD SERVICE</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
				  <form class="form-horizontal" action="" method="post">
					
					<br />
					<div class="form-group">
					  <label  for="desc">Description:</label>
					  <div >
						<input type="text" class="form-control" id="desc"  name="desc">
					  </div>
					</div>
					<div class="form-group">
					  <label  for="serv_type">Type of Service:</label>
					  <div >          
							<select class="form-control" id="serv_type" name="serv_type">
								<option >Grooming</option>
								<option >Treatment</option>							
							</select>
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
	  </div><!-- End of Add Service Modal
	  
	  
	  	<!-- Update Service Modal -->
	  <div class="modal fade" id="updateservicemodal" role="dialog">
		<div class="modal-dialog modal-md">
		
		  <!-- Modal content-->
		  <div class="modal-content" id="registermodal">
			<div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
			  <h3 class="modal-title text-center" style="font-size:25px; font-weight:bold; margin-left:30%;">UPDATE SERVICE</h3>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="padding:50px;padding-top:0px;">
					<br/>
					<br/>
				  <form class="form-horizontal" action="" method="post">
					<div class="form-group">
					  <label  >Service ID:</label>
					  <div >
						<input type="text" class="form-control" id="serviceid"  name="serviceid" value="" readonly="readonly" >
					  </div>
					</div>
					<br />
					<div class="form-group">
					  <label  for="desc">Description:</label>
					  <div >
						<input type="text" class="form-control" id="desc"  name="desc">
					  </div>
					</div>

			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary" name="update">Save</button>
				  </form>
			</div>
		  </div>
		  
		</div>
	  </div><!-- End of Update Service Modal -->


</div>

<script type="text/javascript">
	function data(dataid){
		$(document).ready(function() {
			$('#serviceid').val(dataid);
		});
	}
</script>