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
                        echo '<li class="active">
                            <a href="'.base_url('vetclinic/billing').'">
                                <i class="now-ui-icons business_badge"></i>
                                <p>Billing</p>
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
                                    <i class="now-ui-icons users_single-02"></i>Hello, <?=$_SESSION['name']?>
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
                                <h2 class="card-title">To be Billed</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-list-search" >
                                        <thead>
                                        <tr>
                                            <div>
                                                <br />
                                                <br />
                                            </div>
                                        </tr>
                                        <tr>
                                            <th class="text-primary" style="text-align:center;">Visit ID</th>
                                            <th class="text-primary" style="text-align:center;">Visit Date</th>
                                            <th class="text-primary" style="text-align:center;">Case Type</th>
                                            <th class="text-primary" style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php
                                        if(isset($data['visits'])){
                                            foreach($data['visits'] as $v){
                                                echo '<tr  style="height:20px;padding:-10px;">  
                                                        <td style="text-align:center;">'.$v['visitid'].'</td>
                                                        <td style="text-align:center;"  >'.$v['visitdate'].'</td>
                                                        <td style="text-align:center;">'.$v['case_type'].'</td>
                                                        <td style="text-align:center;">
                                                            <button type="button" data-toggle="modal" id="'.$v['visitid'].'" data-target="#bill" onclick="updateModal(this.id)" class="btn btn-success" style="font-weight:300;font-size:15px;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Bill</button>
                                                        </td>';
                                            }
                                        } 
                                        ?>
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

    <!-- Modal -->
    <div id="bill" class="modal fade" id='clientModal' role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
    
            <div class="modal-body">
            <div class="container-fluid window" id="addHistory">
					
                    <p class="lead text-center" style="font-size:32px;font-family:'Montserrat';color:#2471A3;font-weight:400;">Billing</p>
                            <div class="row">
                                <hr />
                                <div class="col-md-12">
                                    <?php 
                                    $attributes = array('class'=>'form-horizontal','id'=>'hstryform');
                                    echo form_open('vetclinic/updatehistory/', $attributes); ?>
                                    <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Visit ID:</label>
                                                <input name="visitid" class="form-control" id="Vdoctors" readonly>
                                                    
                                                </input>
                                            </div>
                                            <div class="col-md-6" style="padding-top:30px;">
                                            <div class="row">
                                                <div class="col-md-2">
                                                <label>Pet:</label></div>
                                                <div class="col-md-10">
                                                <input type="text" name="pet" class="form-control" id="VpetsOwned" disabled>
    
                                                </input></div>
                                            </div>
                                            </div>
    
                                            <?php 
                                            date_default_timezone_set('Asia/Manila');
                                            $date=date('m-d-Y');
                                            ?>
                                            <div class="col-md-6">
                                                <label>Date:&nbsp;</label>
                                                <input type="text" name="date" class="form-control" disabled></input>
                                            </div>
                                        <hr />
                                        <div class="col-md-12 form-group">
                                            <label>Doctor:</label>
                                            <input name="doctor" class="form-control" id="Vdoctors" disabled>
                                                
                                            </input>
                                        </div>
                                        <br />
                                        <div class=" col-md-12 form-group">
                                            <label for="">Diagnosis :</label>
                                            <textarea placeholder="Diagnosis" class="form-control" name="findings" rows="4" disabled></textarea>
                                        </div>
                    
                                        <div class="col-md-12 form-group">
                                            <label for="">Recommendations :</label>
                                            <textarea placeholder="Recommendations" class="form-control" name="recom" rows="4" disabled></textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                        <label>Service Type:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="svctype" disabled>
                                            <!--
                                            <label class="radio-inline" style="font-weight:400;font-size:16px;cursor:pointer;">
                                                <input value="Grooming" type="radio" class="srvcs" name="optradio"><span class="srvcss"> Grooming&nbsp;&nbsp;</span>
                                            </label>
                                            <label class="radio-inline" style="font-weight:400;font-size:16px;cursor:pointer;" >
                                                <input value="Treatment" type="radio" class="srvcs" name="optradio"><span class="srvcss"> Treatment</span>
                                            </label>
                                            <br />
                                            <input type="hidden" id="btn_get" name="get_btn_value"></input>
                                            <br />
                                            -->
                                        </div>
    
                                        <input type="text" class="form-control" name="Select1" id="Select1" disabled>
                                        </input>
                                        <br/>
                                <?=$_SESSION['isDoctor']!=0?'':'<div class="row form-group">
                                    <div class="col-md-3"><label>Service Fee:</label></div>
                                    <div class="col-md-9">
                                    <input type="number" placeholder="" id="" name="visit_cost" class="form-control"/></div>'?>
                                </div><br/>
                                        <!--
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
    
    
                                            
                                                    <input type="hidden" name="hiddenSum" id="hiddenSum" /> <!- - compute sum hidden field- ->
                                                
                                            </tr>
                                        </tfoot>
                                    
                                            </tbody>
                                            
    
                                        </table>
                                        -->
    
                                        
    
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
                                <button type="submit" class="btn btn-info">Bill</button>
                            </div>
                    <?php echo form_close(); ?>
            </div>
            </div>

        </div>
    </div>

    <script>
        function updateModal(id){
            $.ajax({
                type: 'POST',
                url: 'ajax_list',
                data:{id: id},
                    success: function(data) {
                        var obj = JSON.parse(data);
                        console.log(obj.visit);
                        $("[name='visitid']").val(obj.visit['visitid']);
                        $("[name='date']").val(obj.visit['visitdate']);

                        $("[name='pet']").val(obj.visit['pname']);

                        $("[name='svctype']").val(obj.visit['case_type']);
                        $("[name='Select1']").val(obj.visit['desc']);
                        
                        if(obj.visit['case_type']==='Grooming')
                            $("input[value='Grooming']").prop("checked", true);
                        else
                            $("input[value='Treatment']").prop("checked", true);

                        $("[name='findings']").val(obj.visit['findings']);
                        $("[name='recom']").val(obj.visit['recommendation']);

                        $("[name='totalCost']").val(obj.visit['Total']);
                    }
            });
        }
    </script>

</body>