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
                    <li class="active">
                        <a href="#subPages2" data-toggle="collapse" class="collapsed">
                            <i class="now-ui-icons shopping_basket"></i>
                            <p>Inventory</p>
                        </a>
                            <li>
                            <div id="subPages2" class="collapse ">
                                <ul class="nav">
                                    <li class="active"><a href="<?php echo base_url('vetclinic/inventory'); ?>" class=""><i class="now-ui-icons shopping_box"></i>Stocks</a></li>
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
                                <h2 class="card-title">Edit Item</h2>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid window" id="clientDet">
                                    <?php echo form_open('vetclinic/updateitem', ['class'=>'form-horizontal','id'=>'upItem']); ?>
                                    <br /><br />
                                    <?php foreach ($item_dat as $item){?>
                                    <p class="lead text-center" style="font-size:32px;font-family:'Montserrat';font-weight:500; color:#2471A3;">Item Details</p>
                                    <hr />
                                        <div class="row">
                                            <div class=" col-md-4 form-group text-center">
                                                <label for="">Item id</label>
                                            <p style="font-weight:bold" id="itemid" value=""><?php echo $item->itemid;?></p>
                                            <?php $thisId=$item->itemid;?>
                                            <input type="hidden" name="itemid" value='<?php echo $item->itemid;?>'>
                                        <h1></h1>    
                                            </div>

                                            <div class=" col-md-4 form-group text-center">
                                                <label for="">Item Description</label>
                                                 <input type="text" class="form-control form-inline" id="itemdesc1" name="itemdesc" value="<?php echo $item->item_desc;?>" /> 
                                                        <p style="font-weight:bold" id="itemdesc2"  value=""><?php echo $item->item_desc;?></p>
                                                          <span class="valerror" id="item1e"></span>
                                            </div>

                                            <div class=" col-md-4 form-group text-center">
                                                <label for="">Quantity</label>
                                                        <p style="font-weight:bold" id="quantity"  value=""><?php echo $item->totalq;?></p>
                                            </div>
                                        <!--    <button class="btn btn-primary" id="modal">modal</button> -->
                                        </div>
                                        <div class="row">
                                            <div class=" col-md-4 form-group text-center">
                                                <label for="">Item Unit</label>
                                                <!-- <input type="text" class="form-control form-inline" id="itemunit" name="itemunit" value="" disabled="true"/> -->
                                                        <p style="font-weight:bold" id="itemunit"  value=""><?php echo $item->dist_unit;?></p>
                                            </div>
                                            <div class=" col-md-4 form-group text-center" id="itemtype2">
                                                <label for="">Item Type</label>
                           <!--                      <input type="text" class="form-control form-inline" id="itemtype1" name="itemtype" value="" /> -->
                                                          <p style="font-weight:bold" id=""  value=""><?php echo $item->itemtype;?></p>
                                            </div>
                                             <div id="itemtype1">
                                              <label for="qty_left">Item type:</label>

                                              <select style="font-size:15px; font-weight:bold;" name="type" class="form-control" id="Types1">

                                              </select>
                                            </div>
                                            <div class=" col-md-4 form-group text-center" style="margin-top:-7px;"> 
                                            <button style="font-size:15px;" class="btn btn-primary ecbtn" id="EditItemb">EDIT</button>
                                            </div>
                                        </div>
                                    <hr /> 
                                    <?php }?>                                 
                                   <?php echo form_close();?>
                                </div>  
                                <h2 class="card-title">Purchases</h2>
                                <button type="button" class="btn btn-md btn-info" id="addbutn"  data-toggle="modal" data-target="#myPurchase">
                                                        <span class="glyphicon glyphicon-plus">
                                                        <span class="" style="font-size:20px;color:white;">Add new stock</span>
                                                        </span>
                                </button>
                                <br/>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-list-search" >
                                        <thead>
                                        <tr>
                                            <th class="text-primary">Date Received</th>
                                            <th class="text-primary">Item cost</th>
                                            <th class="text-primary">Current Quantity</th>
                                            <th class="text-primary">Supplier</th>
                                            <th class="text-primary">Expiration Date</th>
                                        </tr>
                                    </thead>
                                        <tbody>     
                                            <?php foreach ($purchase_dat['data'] as $purchase){?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $purchase['date_received']; ?></td>
                                                <td style="text-align:center;"><?php echo $purchase['item_cost']; ?></td>
                                                <td style="text-align:center;"><?php echo $purchase['item_qty']; ?></td>
                                                <td style="text-align:center;"><?php echo $purchase['supplier_name']; ?></td>
                                                <td style="text-align:center;"><?php echo $purchase['item_exp']; ?></td>
                                            </tr>
                                            <?php }?>                                 
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

<div class="modal fade" id="myPurchase" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->

            <div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
                <h4 class="modal-title text-center" id="myModalLabel" style="font-size:25px; font-weight:bold; margin-left:33%;">
                    ADD NEW PURCHASE hehe </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body" style="padding:50px;">
            <?php echo form_open('vetclinic/savenewpurchase/'.$thisId.'', ['class'=>'form-horizontal']); ?>
                  <div class="form-group" >
                    <div>
                    <label for="item_cost">Price:</label>
                    <input type="number" step=0.01 class="form-control globalDisable" id="item_cost" name="item_cost" />
                    </div>
                    <div>
                    <label for="qty_left">Quantity:</label>
                    <input type="number" class="form-control globalDisable" id="qty_left1" class="globalDisable" name="qty_left" min="1"/>
            </div>
            <div>
              <label for="qty_left">Supplier:</label>
              <select style="font-size:15px; font-weight:bold;" name="sup" class="form-control" id="Supplier">

              </select>
            </div>
            <div>
              <label for="qty_left">Expiration Date:</label>
              <input type="date" class="form-control" id="exp_date1" name="exp_date"/>
            </div>

          
               </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="addst" type="submit" class="btn btn-primary">Add</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>

</body>

<script type="text/javascript">

$(document).ready(function(){
            $.ajax({
                    url: 'http://localhost/veterinaryv2/vetclinic/ajax_list',
                        success: function(data) {
                            var obj = JSON.parse(data);
                            var serv = "";
                            var serv2 = "";
                            var serv3 = "";
                            for(var i=0; i<parseInt(obj.suppliers.length); i++){
                                    serv += '<option value='+obj.suppliers[i].id+'>'+obj.suppliers[i].supplier_name+'</option>';
                                }
                                $("#Supplier").html(serv);

                          }
                    });
        });



            $.ajax({
                         url: 'http://localhost/veterinaryv2/vetclinic/ajax_list',
                        success: function(data1) {
                            var obj = JSON.parse(data1);
                          
                            var serv3 = "";

                           console.log(obj);

                          
                            for(var i=0; i<parseInt(obj.types.length); i++){
                                    serv3 += '<option value='+obj.types[i].id+'>'+obj.types[i].itemtype+'</option>';
                                }
                                $("#Types1").html(serv3);



                          }
                    });
       


</script>