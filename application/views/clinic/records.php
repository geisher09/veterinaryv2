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
                                <p>Billing</p>
                            </a>
                        </li>';
                    }
                    ?>
                    <li class="active">
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
                        <form>
                            <div class="input-group no-border">
                                <input type="text" class="form-control" id="search" onkeyup="search()" name="q" placeholder="Search for" required>
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
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
                                <h2 class="card-title">List of Clients</h2>
                            </div>
                            <div class="card-body">
                                <?php if( $error = $this->session->flashdata('responsed')): ?>
                                        <div class="alert alert-dismissible alert-danger">
                                            <?php echo $error; ?>
                                        </div> 
                                <?php endif; ?>

                                <?php if( $error = $this->session->flashdata('response')): ?>
                                        <div class="alert alert-dismissible alert-success">
                                            <?php echo $error; ?>
                                        </div> 
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-list-search" >
                                        <thead>
                                        <tr class="">
                                                    <button type="button" class="btn btn-md btn-info" id="addbutn"  data-toggle="modal" data-target="#addclientmodal">
                                                        <span class="glyphicon glyphicon-plus">
                                                        <span class="" style="font-size:18px;">Add new client </span>
                                                        </span>
                                                    </button>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Client ID</th>
                                            <th class="text-primary">Client's Name</th>
                                            <th class="text-primary">No. of Pets Owned</th>
                                            <th class="text-primary" style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                                <?php if(count($cl) > 0){ ?>
                                        <?php foreach ($cl as $client){ ?>
                                                <tr>
                                            <?php if($client['clientid']<10) { ?>
                                                <td>0000<?php echo $client['clientid']; ?></td>
                                            <?php } ?>
                                            <?php if($client['clientid']>=10&&$client['clientid']<100) { ?>
                                                <td>000<?php echo $client['clientid']; ?></td>
                                            <?php } ?>
                                            <?php if($client['clientid']>=100&&$client['clientid']<1000) { ?>
                                                <td>00<?php echo $client['clientid']; ?></td>
                                            <?php } ?>
                                            <?php if($client['clientid']>=1000&&$client['clientid']<10000) { ?>
                                                <td>0<?php echo $client['clientid']; ?></td>
                                            <?php } ?>
                                            <?php if($client['clientid']>10000) { ?>
                                                <td><?php echo $client['clientid']; ?></td>
                                            <?php } ?>
                                                <td><?php echo $client['cname']?></td>
                                                <td style="text-align:center;"><?php echo $client['pets']; ?></td>
                                                <td style="text-align:center; width:260px;">    
                                                <?php $c=$client['clientid'];?> 
                                                <b class="btn btn-info " style="font-size:10px;" id="<?php echo $c;?>" type="button" onclick="lol(this.id)">View<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php } ?>                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addclientmodal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <?php
      $cid=0;
      $cid=$al+1;
      ?>
      <!-- CHRSTNV validation-->
      <div class="modal-content registerModal">
        <div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
          <h3 class="modal-title" style="font-size:30px;margin:0px auto;"><b>NEW CLIENT FORM</b></h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:60px;padding-top:0px;">
                <br/>
        <?php  echo form_open('vetclinic/save', ['class'=>'form-horizontal','id'=>'addclientform']); ?>
                <div class="form-group row" style="padding:auto;">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class="col-sm-3 col-md-3" style="text-align:right;">Client ID:</label>
                  <div class="col-sm-6 col-md-6">
                    <input type="text" class="form-control" id="clientid"  name="clientid" value="<?php echo $cid;?>" disabled>
                    <input type="hidden" id="hiddenIDNo" value="<?php echo $cid;?>" name="idnum">
                  </div>
                  <div class="col-sm-2 col-md-2"></div>
                </div>
                <hr />
              <div class="newClientboxHead">Owner's Info</div>
            <div class="newClientbox"> 
                <br/>
                <div class="form-group row" >
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="name">Name:</label>
                  <div class="col-sm-8 col-md-8 " id="CNerror">
                    <input type="text" class="form-control" id="name"  name="cname">
                    <p id="CNtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-12">
                        <div><br></div>
                        
                    </div>  
                </div>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="address">Address:</label>
                  <div class="col-sm-8 col-md-8" id="CAerror">          
                    <input type="text" class="form-control" id="address"  name="address">
                    <p id="CAtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
                
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="contact">Contact #:</label>
                  <div class="col-sm-8 col-md-8" id="CCerror">          
                    <input type="text" class="form-control" id="clientnum"   name="contactno">
                    <p id="CCtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
             
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="email">E-mail:</label>
                  <div class="col-sm-8 col-md-8" id="CEerror">          
                    <input type="text" class="form-control" id="email"  name="email">
                    <p id="CEtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
            
                    </div>
                </div>
            </div> 
            <div class="newClientboxHead">Pet's Info</div>
            <div class="newClientbox">
                <br/>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="petname">Name:</label>
                  <div class="col-sm-8 col-md-8" id="CPerror">
                    <input type="text" class="form-control" id="petname"  name="pname">
                    <p id="CPtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
             
                    </div>
                </div>
				<div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="species">Species:</label>
                  <div class="col-sm-8 col-md-8" id="CSerror">
					<select class="sb" name="species" id="petspecies">
						<option value="Dog">Dog </option>
						<option value="Cat">Cat</option>
					</select>
                    <!-- <input type="text" class="form-control" id="petspecies"  name="species"> -->
                    <p id="CStext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
        
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="petbreed">Breed:</label>
                  <div class="col-sm-8 col-md-8" id="CBerror">
					<select class="sb" name="breed" id="petbreed">
						<option value="LR">Loverador Retriever</option>
						<option value="GR">Golden Retriever</option>
					</select>
                    <!-- <input type="text" class="form-control" id="petbreed"  name="breed"> -->
                    <p id="CBtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
        
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-3 col-md-3" for="markings">Color/Markings:</label>
                  <div class="col-sm-7 col-md-7" id="CPerror">
                    <input type="text" class="form-control" id="petmarkings"  name="markings">

                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>

                    </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="birthday">Birthday:</label>
                  <div class="col-sm-8 col-md-8" id="CDerror">
                        <input type="date" class="form-control" id="petbirthday" name="birthday"/>
                        <p id="CDtext" class="valerror"></p>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                  <div class="col-lg-8">
                        <div><br></div>
                
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1 col-md-1"></div>
                  <label class=" col-sm-2 col-md-2" for="sex">Sex:</label>
                  <div class="col-sm-8 col-md-8">
                    <label style="font-weight:400;font-size:16px;cursor:pointer;">
                      <input type="radio" name="sex" value="m"> Male
                    </label><br/>
                    <label style="font-weight:400;font-size:16px;cursor:pointer;">
                      <input type="radio" name="sex" value="f"> Female
                    </label>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" id="sbmtClient" class="btn btn-info">Save</button>
              </form>
        </div>
        <?php form_close();?>
      </div>
      
    </div>
  </div> 
<!--end of add client modal-->

<!----------- Client Detail Modal -------------------->
  <div class="modal fade" id="clientModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
                <div class="btn-group btn-group-lg">
                    <button class="tablink btn btn-info" onclick="details(event, 'clientDet')">Client Details</button>
                    <button class="tablink btn btn-info" onclick="details(event, 'addPet')">Add Pet</button>
                    <button class="tablink btn btn-info" id="hstry" onclick="details(event, 'addHistory');" <?=$_SESSION['isDoctor']==0? 'disabled' : ''?> >Add History</button>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <div class="modal-body">
        
                    <div class="container-fluid window" id="clientDet">
                    <?php echo form_open('vetclinic/updateclient', ['class'=>'form-horizontal']); ?>
                    <p class="lead text-center" style="font-size:32px;font-family:'Montserrat';font-weight:500; color:#2471A3;">Client Details</p>
                    <hr />
                        <div class="row">
                            <div class=" col-md-4 form-group text-center">
                                <label for="">Client No.</label>
                            <input type="hidden" class="form-control " id="clientno1" name="clientno" value="" disabled="true"/> 
                            <p id="clientno" value=""></p>
                        <h1></h1>    
                            </div>
                            <div class=" col-md-4 form-group text-center">
                                <label for="">Name </label>
                                <input type="text" class="form-control form-inline" id="custname1" name="" value="" disabled="true"/>
                                        <p id="custname"  value=""></p>
                            </div>
                            <div class="col-md-4 form-group text-center" id="cnume">
                                <label for="">Contact No.</label>
                                <input type="number" class="form-control line" id="custcontactno1" name="num" value="<?php echo set_value('num'); ?>" maxlength="11" min="0"/>
                                <p id="conerror" class="valerror"></p>
                                        <p id="custcontactno"  value=""></p>
                            </div>
                        <!--    <button class="btn btn-primary" id="modal">modal</button> -->
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group text-center" id="emaile">
                                <label for="">E-mail</label>
                                <input type="text" class="form-control line" id="custemail1" name="num2" value="<?php echo set_value('num2'); ?>"/>
                                <p id="emailerror" class="valerror"></p>
                                        <p id="custemail"  value=""></p>
                            </div>
                            <div class="col-md-4 form-group text-center" id="addre">
                                <label for="">Address</label>
                                <input type="text" class="form-control line" id="custaddress1" name="num3" value="<?php echo set_value('num3'); ?>"/>
                                <p id="addrerror" class="valerror"></p>
                                        <p id="custaddress" value=""></p>
                            </div>
                            <div class=" col-md-4 form-group text-center" style="margin-top:10px;"> 
                            <button class="btn btn-primary ecbtn" id="editClient">EDIT</button>
                            </div>
                        </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                                <p class="lead text-center" style="font-size: 25px;font-family:'Montserrat'; font-weight:500;color:#2471A3;">List of Owned Pet(s)</p>
                                <div style="height: 300px; overflow: auto">
                                    <table id="petList" class="table table-hover" style="margin-top: 20px;">
                                        <th align="center" class="text-center table-bordered bg-info" style="background-color:#d9d9d9;">Pet ID</th>
                                        <th align="center" class="text-center table-bordered bg-info" style="background-color:#d9d9d9;">Pet Name</th>
                                        <th align="center" class="text-center table-bordered bg-info" style="background-color:#d9d9d9;">View</th>
                                        <th align="center" class="text-center table-bordered bg-info" style="background-color:#d9d9d9;">Visit</th>
                                        <tbody align="center" id="petsOwned">

                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    
                        <div class="col-md-6 collapse" id="pet_detail">
                            <p class="lead text-center" style="font-size: 25px;font-family:'Arvo'; color:#2471A3;">Pet Details</p>
                                <div class="row">
                                    <div class="col-md-6 form-group text-center">
                                        <span style="white-space: nowrap">
                                        <label for="">Pet Name:</label>
                                <!--        <input type="text" class="form-control" id="petsname" name="petsname" value=""> -->
                                <p id="petsname"></p>
                                        </span>
                                    </div>
                            
                                    <div class="col-md-6 form-group text-center">
                                        <label for="">Pet ID:</label>
                                        <!-- <input type="text" class="form-control" id="petsid" name="petsid" value="" disabled="true"/> -->
                                        <p id="petsid"></p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group text-center">
                                        <label for="">Breed:</label>
                            <!-- <input type="text" class="form-control" id="petsbreed" name="petsbreed" value="" disabled="true"/>-->
                                        <p id="petsbreed"></p>      
                                </div>
                            
                            
                                    <div class="col-md-6 form-group text-center">
                                        <label for="">Birthday:</label>
                                        <!-- <input type="text" class="form-control" id="petsbirthday" name="petsbirthday" value="" disabled="true"/> -->
                                            <p id="petsbirthday"></p>
                                    </div>  
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group text-center">
                                        <label for="">Sex:</label>
                            <!--            <input type="text" class="form-control" id="petssex" name="petssex" value="" disabled="true"/> -->
                                            <p id="petssex"></p>
                                    </div>

                                    <div class="col-md-6 form-group text-center">
                                        <label for="">Markings:</label>
                                        <!-- <input type="text" class="form-control" id="petsmarkings" name="petsmarkings" value=""/> -->
                                            <p id="petsmarkings"></p>
                                    </div>      
                                </div>  
                        </div>
                    </div>

                    
                    <?php echo form_close();?>
                </div>
                    
                <div class="container-fluid window" id="addPet">
					<p class="lead text-center" style="font-size:32px; font-family:'Montserrat'; font-weight:400;color:#2471A3;">Add Pet</p>
					<hr />
					<form></form>
					<?php echo form_open('vetclinic/savepet', ['class'=>'form-horizontal','id'=>'addPetForm']); ?>
                        <br/>
							<div class="form-group row" id="Perror">
<!--								<span style="white-space: nowrap">-->
                                <div class=" col-sm-1 col-md-1"></div>
								<label class=" col-sm-2 col-md-2" for="">Pet Name:</label>
                                <div class="col-sm-8 col-md-8">
								    <input type="text" class="form-control" id="Mypetname" name="pname" />
                                </div>
								<p id="Peterror" class="valerror"></p>
<!--								</span>-->
                                <div class=" col-sm-1 col-md-1"></div>
							</div>
							
							<div class="form-group">
								<input type="hidden" id="addpetclientno" name="addpetclientno"/>
							</div>
                        <br/>
							<div class="form-group row" id="Terror">
                                <div class=" col-sm-1 col-md-1"></div>
								<label class=" col-sm-2 col-md-2" for="">Species:</label>
                                <div class="col-sm-8 col-md-8">
								<select class="sb" name="species" id="addpetype">
									<option value="Dog">Dog</option>
									<option value="Cat">Cat</option>
									<option value="Hedgehog">Hedgehog</option>
									<option value="Rabbit">Rabbit</option>
								</select>
                                </div>
                                <div class=" col-sm-1 col-md-1"></div>
								<!-- <input type="text" class="form-control" id="addpetype" name="species"/> -->
								<p id="Typeerror" class="valerror"></p>
							</div>
							<br/>
							<div class="form-group row" id="Berror">
                                <div class=" col-sm-1 col-md-1"></div>
								<label class=" col-sm-2 col-md-2" for="">Breed:</label>
                                <div class="col-sm-8 col-md-8">
								<select class="sb" name="breed" id="addpetbreed">
									<option value="Labrador">Loverador Retriever</option>
									<option value="Golden Retriever">Golden Retriever</option>
								</select>
                                </div>
                                <div class=" col-sm-1 col-md-1"></div>
								<!-- <input type="text" class="form-control" id="addpetbreed" name="breed"/> -->
								<p id="Breerror" class="valerror"></p>
							</div>
							<br/>
							<div class="form-group row" id="Derror">
                                <div class=" col-sm-1 col-md-1"></div>
								<label class=" col-sm-2 col-md-2" for="">Birthday:</label>
                                <div class="col-sm-8 col-md-8">
								<input type="date" class="form-control" id="addpetbday" name="birthday"/>
                                </div>
                                <div class=" col-sm-1 col-md-1"></div>
								<p id="Bdayerror" class="valerror"></p>
							</div>	
							<br/>
							<div class="form-group row" id="Merror">
                                <div class=" col-sm-1 col-md-1"></div>
								<label class=" col-sm-2 col-md-2" for="">Markings:</label>
                                <div class="col-sm-8 col-md-8">
								<input type="text" class="form-control" id="addpetmarkings" name="markings"/>
                                </div>
                                <div class=" col-sm-1 col-md-1"></div>
								<p id="Markerror" class="valerror"></p>
							</div>
                        <br/>
							<div class="form-group row">
                                <div class=" col-sm-1 col-md-1"></div>
								<label class=" col-sm-2 col-md-2" for="sex">Sex:</label>
								  <div class="col-sm-8 col-md-8">
                                    <label style="font-weight:400;font-size:16px;cursor:pointer;">
                                      <input type="radio" name="sex" value="m"> Male
                                    </label><br/>
                                    <label style="font-weight:400;font-size:16px;cursor:pointer;">
                                      <input type="radio" name="sex" value="f"> Female
                                    </label>
								  </div>
                                <div class=" col-sm-1 col-md-1"></div>
							</div>
                        <br/>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="submit" id="sbmtPet" class="btn btn-primary">Save</button>
						</div>
						<?php echo form_close();?>
				</div>
        
                <div class="container-fluid window2" id="visitHistory">
                    <div class="row">
                    <div class="col-md-6">
                        <p class="lead text-center" style="font-size:23px;font-family:'Montserrat';font-weight:400;color:#2471A3;">History of Visits</p>
                        
                            <div style="min-height:500px;max-height:700px; overflow: auto">
                                <table align="center" id="petList" class="table table-hover" style="margin-top: 20px;">
                                    <th align="center" class="table-bordered bg-info" style="background-color:#d9d9d9;">Date</th>
                                    <th align="center" class="table-bordered bg-info" style="background-color:#d9d9d9;">Pet ID</th>
                                    <th align="center" class="table-bordered bg-info" style="background-color:#d9d9d9;">Service Type</th>
                                    <th align="center" class="table-bordered bg-info" style="background-color:#d9d9d9;">View Full Visit</th>

                                    <tbody align="center" id="PetsVisits">
                                        
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
    
                    <div class="col-md-6 collapse" id="fullVisitDet">
                        <p class="lead text-center" style="font-size:23px;font-family:'Montserrat'; font-weight:400;color:#2471A3;">Full Visit Details</p>
                        <form role="form" method="post" class="form-group">
                            <div class="row">
                                <div class="col-md-12" id="basicid"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="visitdate"></div>
                            </div>
                
                            <div class="row">
                                <div align="center" class="col-md-12" id="visitdoctor">
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class=" col-md-12 form-group">
                                    <label for="">Findings :</label>
                                    <textarea id="visitfindings" class="form-control" name="findings" rows="2" readonly>Findings here.</textarea>
                                </div>
                            </div>
                
                            <div class="row ">
                                <div class="col-md-12 form-group">
                                    <label for="">Recommendations :</label>
                                    <textarea id="visitrecom" class="form-control" name="findings" rows="2" readonly>Recommendations.</textarea>
                                </div>  
                            </div>
                        
                            <div class="row">
                                <div align="left" class="col-md-12" id="visitservice">
                                </div>
                            </div>
                
                            <hr />
                
                            <div class="row">
                                <div class="col-md-12 column">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-info" style="font-size:18px;">
                                                Item Used ID
                                                </th>
                                                <th class="text-center bg-info" style="font-size:18px;">
                                                Item Description
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemsused">
                                        

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                            <hr />
                        
                                <!-- service fee field -->
                            <div class="row">
                                <div class=" col-md-5 form-group">
                                    <p class="text-right" style="font-size:19px;">Service Fee: (Php)</p>
                                </div>
                                <div class=" col-md-7 form-inline pull-to-left">
                                    <input type="text" name='totalCost' placeholder='0.00' class="form-control ad" id="servicecost" readonly style="width:200px;"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-5 form-group">
                                    <p class="text-right" style="font-size:19px;">Total Cost: (Php)</p>
                                </div>
                                <div class=" col-md-7 form-inline pull-to-left">
                                        <input type="text" name='totalCost' placeholder='0.00' class="form-control ad" id="visitcost" readonly  style="width:200px;"/>
                                    <div id="" ></div>
                                </div>
                            </div>
                        </form>
                    </div>
                        </div>
                </div>  
            
				<div class="container-fluid window" id="addHistory">
					
				<p class="lead text-center" style="font-size:32px;font-family:'Montserrat';color:#2471A3;font-weight:400;">Add History</p>
						<div class="row">
							<hr />
							<div class="col-md-12">
								<?php 
								$attributes = array('class'=>'form-horizontal','id'=>'hstryform');
								echo form_open('vetclinic/savehistory', $attributes); ?>
								<div class="row">
										<div class="col-md-6" style="padding-top:30px;">
                                        <div class="row">
                                            <div class="col-md-2">
                                            <label>Pet:</label></div>
                                            <div class="col-md-10">
                                            <select name="pet" class="form-control" id="VpetsOwned">

                                            </select></div>
                                        </div>
										</div>

										<?php 
										date_default_timezone_set('Asia/Manila');
										$date=date('m-d-Y');
										?>
										<div class="col-md-6">
											<h4 name="date" class=""><label>Date:&nbsp;</label><?php echo $date;?></h4>
										</div>
									<hr />
									<div class="col-md-12 form-group">
										<label>Doctor:</label>
										<input name="doctor" class="form-control" id="Vdoctors" value="<?=$_SESSION['name']?>" readonly />
                                        <input type="hidden" name="userID" value="<?=$_SESSION['userID']?>" />
									</div>
									<br />
                                   
									<div class=" col-md-12 form-group">
										<label for="">Diagnosis :</label><span id="findingserror" class="valerror"></span>
										<textarea placeholder="Diagnosis" id="petfindings" class="form-control" name="findings" rows="4"></textarea>

									</div>
				             
									<div class="col-md-12 form-group">
										<label for="">Recommendations :</label>
										<textarea placeholder="Recommendations" class="form-control" name="recom" rows="4"></textarea>
									</div>
									
								</div>
							</div>
							
							<div class="col-md-12">
									<label>Service Type:</label>
									<div class="col-md-12">
										<label class="radio-inline" style="font-weight:400;font-size:16px;cursor:pointer;">
											<input value="Grooming" type="radio" class="srvcs" name="optradio"><span class="srvcss"> Grooming&nbsp;&nbsp;</span>
										</label>
										<label class="radio-inline" style="font-weight:400;font-size:16px;cursor:pointer;" >
											<input value="Treatment" type="radio" class="srvcs" name="optradio"><span class="srvcss"> Treatment</span>
										</label>
                                        <br />
									    <input type="hidden" id="btn_get" name="get_btn_value"></input>
									    <br />
									</div>

									<select class="form-control" name="Select1" id="Select1">
									</select>
									<br/>
                            <?=$_SESSION['isDoctor']!=0?'':'<div class="row form-group">
                                <div class="col-md-3"><label>Service Fee:</label></div>
                                <div class="col-md-9">
                                <input type="number" placeholder="" id="" name="" class="form-control"/></div>'?>
                            </div><br/>
									<table class="table table-bordered table-hover" id="tab_logic">
										<thead>
											<tr>
												<th class="text-center" style="background-color:#d9d9d9;font-size:18px;">#</th>
												<th class="text-center" style="background-color:#d9d9d9;width:300px;font-size:18px;">Item Used</th>
												<th class="text-center" style="background-color:#d9d9d9;font-size:18px;">Quantity</th>
												<th class="text-center" style="background-color:#d9d9d9;font-size:18px;">Unit price</th>
												<th class="text-center" style="background-color:#d9d9d9;font-size:18px;">Amount</th>
											</tr>
										</thead>
										<tbody>
											
											<tr id='addr0'>
												
												<td class="text-center">
													1
												</td>
												<td>
													<select class='form-control Vitems'><option></option></select>
												</td>
												<td>
													<input type="number" name='qty0' id="myitem0" placeholder='Qty' class="form-control addtm" min="0"/>
													<input id="prdid0" class='prd' type='hidden'></input>
												</td>
												<td>
													<input type="number" name='qty0' id="qtyprice0" placeholder='Price' class="form-control ITprice" min="0" readonly />
												</td>
												<td>
													<input type="number" name='qty0' id="amount0" placeholder='Price' class="form-control Tamount" min="0" readonly/>
												</td>

											</tr>
											<tr id='addr1'>
												

											</tr>
											<tr id='addr1'>
												

											</tr>
										<tfoot>
												
											<tr>


										
												<input type="hidden" name="hiddenSum" id="hiddenSum" /> <!-- compute sum hidden field-->
											
										</tr>
									</tfoot>
								
										</tbody>
										

									</table>

									<div class="btn-group">
										<a id="add_row" class="btn btn-primary pull-center" onclick="sos(this.id)" data-toggle="tooltip" title="Add another row" style="font-size:15px;color:white;"><span class="now-ui-icons ui-1_simple-add" aria-hidden="true"></span></a>
										<a id="delete_row" class="pull-right btn btn-danger" data-toggle="tooltip" title="Delete a row" style="font-size:15px;color:white;"><span class="now-ui-icons ui-1_simple-delete" aria-hidden="true"></span></a>
									</div>

								<?=$_SESSION['isDoctor']!=0?'':'<div class=" row form-group"><br/>
                                    <div class="col-md-4"><h4 class="">Total Cost: (Php)</h4></div>
                                    <div class="col-md-8" style="padding-top:30px;">
									<input type="number" name="totalCost" placeholder="0.00" class="form-control" readonly/>
                                        </div>
								</div>'?>
						
							</div>
      
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" id="sbmtbtn" class="btn btn-info">Save</button>
						</div>
				<?php echo form_close(); ?>


			
			<!-----------------FOOTER ------------>
			<!-- <div class="modal-footer">
				<button type="button" onclick="" class="btn btn-primary" data-dismiss="modal">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
						
			</div>


    
     </div>

    </div>
    </div>
</div>

<!--Script for select2-->
<script>
	$(document).ready(function() {
		$('.sb').select2({ width : '100%'});
	});
</script>


<!--Script for the item used-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$('.modal').on('hidden.bs.modal', function (e) {
  if($('.modal').hasClass('in')) {
    $('body').addClass('modal-open');
  }
});
    document.getElementsByClassName("tablink")[0].click();

    function details(evt, windowName,id) {
        var i, x, tablinks;
        x = document.getElementsByClassName("window");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
            $(".window2").css('display','none');
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
        tablinks[i].classList.remove("w3-light-grey");
        }
        document.getElementById(windowName).style.display = "block";
        evt.currentTarget.classList.add("w3-light-grey");
        };
        
        $(document).ready(function() {
          $('#modal-6').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');

                    alert(id);
          });
        });
        //adding rowss
        $(document).ready(function(){
                var value="";
              var i=1;
               sos(this.id);
             $("#add_row").click(function(){
            
              $('#addr'+i).html("<td class='text-center'>"+ (i+1) +"</td><td><select class='form-control Vitems'><option></option></select></td><td><input name='qty"+i+"' type='number' placeholder='Qty' id='myitem"+i+"' class='form-control input-md addtm' min='0'><input id='prdid"+i+"' value='0' class='prd' type='hidden'></input></td><td><input type='number' name='qty0' id='qtyprice0' placeholder='Price' class='form-control ITprice' min='0' readonly /></td><td><input type='number' name='qty0' id='amount0' placeholder='Price' class='form-control Tamount' min='0' readonly/></td>");

              $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');

                for(var a=0 ;a<i; a++){
                    value =  $("#myitem"+a).val();
                    
                    }
              i++; 
          });
             $("#delete_row").click(function(){
                                            var last=$('input[class*="prd"]').length;
                                            var min =0;
                                            min = $("#hiddenSum").val()-$("#prdid"+(i-1)).val();
                                            
                                            $("#TotalSum").text("? "+min.toLocaleString("en"));
                                        

                 if(i>1){
                 $("#addr"+(i-1)).html('');


                                            // alert($("#prdid"+(last)).val());

                 i--;

                 }
             });
             var ID = $("#hiddenIDNo").val();
             if(ID<10){
                document.getElementById('clientid').value = '0000'+$("#hiddenIDNo").val();
             }
             else if(ID>=10 && ID<100){
                document.getElementById('clientid').value = '000'+$("#hiddenIDNo").val();
             }
             else if(ID>=100 && ID<1000){
                document.getElementById('clientid').value = '00'+$("#hiddenIDNo").val();
             }
             else if(ID>=1000 && ID<10000){
                document.getElementById('clientid').value = '0'+$("#hiddenIDNo").val();
             }
             else{
                document.getElementById('clientid').value = $("#hiddenIDNo").val();
             }
        });
        
        // $(function() {
  //       $('#buttoncheck').click(function () {
  //           var var_name = $("input[name='optradio']:checked").val();
  //           $('#btn_get').val(var_name);
  //           newp(var_name);
  //       });
  //    });


        function newp(type){
            $.ajax({
                    type: 'POST',
                    url: 'ajax_list',
                    data:{id: $('#clientno').val()},
                        success: function(data) {
                            var obj = JSON.parse(data);
                            var serv = "";
                            if(type=='Treatment'){
                                for(var i=0; i<parseInt(obj.treatments.length); i++){
                                    serv += '<option value='+obj.treatments[i].id+'>'+obj.treatments[i].desc+'</option>';
                                }
                                $("#Select1").html(serv);
                            }
                            else{
                                for(var i=0; i<parseInt(obj.grooms.length); i++){
                                    serv += '<option value='+obj.grooms[i].id+'>'+obj.grooms[i].desc+'</option>';
                                }
                                $("#Select1").html(serv);
                            }

                        }
                    });
        }
        
        function pop(id){
            $('#fullVisitDet').hide();
            $.ajax({
                    type: 'POST',
                    url: 'ajax_list',
                    data:{id: id},
                        success: function(data) {
                            var obj = JSON.parse(data);
                            // console.log(obj.pet);
                            $('#petsid').text(obj.pet.petid);
                            $("#petsbreed").text(obj.pet.breed);
                            $("#petsname").text(obj.pet.pname);
                            $("#petsmarkings").text(obj.pet.markings);
                            $("#petssex").text(obj.pet.sex);
                            $("#petsbirthday").text(obj.pet.birthday);
                          $('#pet_detail').show();                        
                        }
                    });
        }



        function history(id){
            $('#pet_detail').hide();

                    //CHRSTNV item cost
            document.getElementById("itemsused").innerHTML="";
            $.ajax({
                    type: 'POST',
                    url: 'ajax_list',
                    data:{id: id},
                        success: function(data) {
                            var obj = JSON.parse(data);
                            console.log(obj);
                            var s="";
                            var r="";
                            var t="";
                            s = '<p align="center" style="font-size:20px;">Visit ID: '+obj.visit.visitid+'<br/>'+'Visit Date: '+obj.visit.visitdate+'</p>';
                            t = '<p align="center" style="font-size:20px;">Doctor: '+obj.visit.name+'</p>';
                            r = '<p align="center" style="font-size:20px;">Service Type: '+obj.visit.case_type+'&emsp;'+'Service Done: '+obj.visit.desc+'</p>';
                            q = '<p align="center" style="font-size:20px;">Pet ID: '+obj.visit.petid+'&emsp;'+'Pet name: '+obj.visit.pname+'</p>';
                            var item = "";
                            if(parseInt(obj.items.length) > 0){
                                for(var i=0; i<parseInt(obj.items.length); i++){
                                    item += '<tr><td>'+obj.items[i].items_used+'</td><td>'+obj.items[i].item_desc+'</td></tr>';
                                }
                                item+='<tr><td colspan="3">Item Cost ₱ '+obj.visit.itemCost+'</td></tr>'
                                $("#itemsused").html(item);
                                
                        

                            }

                            $('#basicid').html(s);
                            $('#visitdate').html(q);
                            $("#visitdoctor").html(t);
                            $("#visitservice").html(r);
                            $("#visitrecom").val(obj.visit.recommendation);
                            $("#visitfindings").val(obj.visit.findings);
                            $("#visitcost").val('₱ '+parseInt(obj.visit.Total).toLocaleString('en'));
                            $("#servicecost").val('₱ '+parseInt(obj.visit.visit_cost).toLocaleString('en'));

                          $('#fullVisitDet').show();                          
                        }
                    });
        }

        function visit(id){
            $('#pet_detail').hide();
            $('#fullVisitDet').hide();
            document.getElementById("PetsVisits").innerHTML="";
            $.ajax({
                    type: 'POST',
                    url: 'ajax_list',
                    data:{id: id},
                        success: function(data) {
                            var obj = JSON.parse(data);
                             console.log(obj.visits);
                             var s = "";

                            if(parseInt(obj.visits.length) > 0){
                                for(var i=0; i<parseInt(obj.visits.length); i++){
                                    s += '<tr><td>'+obj.visits[i].visitdate+'</td><td>'+obj.visits[i].petid+'</td><td>'+obj.visits[i].case_type+'</td><td><button class="btn btn-info" id="'+obj.visits[i].visitid+'"type="button" onclick="history(this.id)"><span class="now-ui-icons files_single-copy-04" aria-hidden="true"></span></button></td></tr>';
                                }
                                $("#PetsVisits").html(s);                               
                            }
                          
                          $(details(event,'visitHistory')).show();                    
                        }
                    });
        }



        function sos(id){
            $.ajax({
                    type: 'POST',
                    url: 'ajax_list',
                    data:{id: id},
                        success: function(data) {
                            var obj = JSON.parse(data);
                             console.log(id);
                             var ai = "";
                            for(var i=0; i<parseInt(obj.allitems.length); i++){
                                    ai += '<option value='+obj.allitems[i].itemid+'>'+obj.allitems[i].item_desc+'</option>';
                                    //hi += '<option value='+obj.allitems[i].stockno+'>'+obj.allitems[i].item_desc+'</option>';
                             
                                }

                            $("#additemId").val(id);
                            $(".Vitems").last().html(ai);
                            //$("#Vitems2").html('<option value="wsss">wsss</option>');
                                          
                        }
                    });
        }

        // function updateclient(id){
        //  document.getElementById("VpetsOwned").innerHTML="";
        //  $.ajax({
        //          type: 'POST',
        //          url: 'vetclinic/ajax_list',
        //          data:{id: id},
        //              success: function(data) {
        //                  var obj = JSON.parse(data);
        //                  console.log(id);
        //                  var s = "";
        //                  if(parseInt(obj.pets.length) > 0){
        //                      for(var i=0; i<parseInt(obj.pets.length); i++){
        //                          s += '<option value="+obj.pets[i].petid+">'+obj.pets[i].pname+'</option>';
        //                          // s += '<tr><td>'+obj.pets[i].petid+'</td><td>'+obj.pets[i].pname+'</td><td><button class="btn btn-info" id="'+obj.pets[i].petid+'"type="button" onclick="pop(this.id)"><span class="now-ui-icons files_single-copy-04" aria-hidden="true"></span></button></td><td><button class="tablink btn btn-info" id="'+obj.pets[i].petid+'"type="button" onclick="visit(this.id)"><span class="now-ui-icons location_pin" aria-hidden="true"></span></button></tr>';
        //                      }
        //                      $("#VpetsOwned").html(s);                               
        //                  }
        //                  $('#addpetclientno').val(id);
        //                  $('#clientno').val(obj.client.clientid);
        //                  $("#custname").val(obj.client.cname);
        //                  $("#custemail").val(obj.client.email);
        //                  $("#custaddress").val(obj.client.address);
        //                  $("#custcontactno").val(obj.client.contactno);

        //                  $(details(event,'addHistory')).show();
        //              }
        //  });
        // }

        function lol(id){
            document.getElementById("petsOwned").innerHTML="";
            document.getElementById("VpetsOwned").innerHTML="";
            //$('#clientModal').modal('show');
            //$('#petsOwned').show();
            $('#pet_detail').hide();
            $('#fullVisitDet').hide();
            //$('#visitHistory').hide();
            $.ajax({
                    type: 'POST',
                    url: 'ajax_list',
                    data:{id: id},
                        success: function(data) {
                            var obj = JSON.parse(data);
                            console.log(obj.pets);
                            //console.log(obj.services);
                        
                            var s = "";
                            var v = "";
                            var d = "";
                            var serv = "";
                            var ai = "", hi="";
                            if(parseInt(obj.pets.length) > 0){
                                for(var i=0; i<parseInt(obj.pets.length); i++){
                                    s += '<tr><td>'+obj.pets[i].petid+'</td><td>'+obj.pets[i].pname+'</td><td><button class="btn btn-info" id="'+obj.pets[i].petid+'"type="button" onclick="pop(this.id)"><span class="now-ui-icons files_single-copy-04" aria-hidden="true"></span></button></td><td><button class="btn btn-info" id="'+obj.pets[i].petid+'"type="button" onclick="visit(this.id)"><span class="now-ui-icons location_pin" aria-hidden="true"></span></button></tr>';
                                    v += '<option value='+obj.pets[i].petid+'>'+obj.pets[i].pname+'</option>';

                                }

                                $("#petsOwned").html(s);
                                $("#VpetsOwned").html(v);
                                
                            }

                            for(var i=0; i<parseInt(obj.vets.length); i++){
                                    d += '<option value='+obj.vets[i].vetid+'>'+obj.vets[i].vetname+'</option>';
                                }
                                $("#Vdoctors").html(d);

                        //  alert(obj.client.clientid);
                            
                        //plain text
                            $('#addpetclientno').val(id);
                            $('#clientno').text(obj.client.clientid);
                            $("#custname").text(obj.client.cname);
                            $("#custemail").text(obj.client.email);
                            $("#custaddress").text(obj.client.address);
                            $("#custcontactno").text(obj.client.contactno);
                            //input fields value
                            $("#custemail1").val(obj.client.email);
                            $("#custaddress1").val(obj.client.address);
                            $("#custcontactno1").val(obj.client.contactno);
                            $('#clientno1').val(obj.client.clientid);
                            $("#custname1").val(obj.client.cname);

                            $('#clientModal').modal('show');
                        }
            });
        }

</script>
</body>

</html>
