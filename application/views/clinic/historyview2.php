<!DOCTYPE html>
<html lang="en">

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    (Logo)
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
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
                        <a href="<?php echo base_url('vetclinic/sales'); ?>">
                            <i class="now-ui-icons business_chart-bar-32"></i>
                            <p>Sales</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#subPages" data-toggle="collapse" class="collapsed">
                            <i class="now-ui-icons shopping_basket"></i>
                            <p>Inventory</p>
                        </a>
                            <li>
                            <div id="subPages" class="collapsed">
                                <ul class="nav">
                                    <li><a href="<?php echo base_url('vetclinic/inventory'); ?>" class=""><i class="now-ui-icons shopping_box"></i>Stocks</a></li>
                                    <li class="active"><a href="<?php echo base_url('vetclinic/history'); ?>" class=""><i class="now-ui-icons arrows-1_refresh-69"></i>History</a></li>
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
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
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
                                <h4 class="card-title">Transactions</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-list-search" id="mytable">
                                        <thead>
                                        <tr class="th1">
                                            <th >
                                                <div>
                                                    <button type="button" class="btn btn-md" id="addbutn"  data-toggle="modal" data-target="#myModalHistory">
                                                        <span class="glyphicon glyphicon-plus">
                                                        <span class="tooltiptext">Sold an item</span>
                                                        </span>
                                                    </button>
                                                </div> 
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Item ID.</th>
                                            <th class="text-primary">Action</th>
                                            <th class="text-primary">Description</th>
                                            <th class="text-primary">Date</th>
                                        </tr>
                                    </thead>
                                        <tbody>

                                        <?php
                                                foreach($itemhistory as $r){
                                                    echo '  <tr>    
                                                            <td style="text-align:center;">'.$r['itemid'].'</td>
                                                            <td style="text-align:left;">'.$r['action'].'</td>
                                                            <td style="text-align:left;">'.$r['description'].'</td>
                                                            <td style="text-align:left;">'.$r['date'].'</td>
                                                        </tr>
                                                        ';
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
    <!-- Update History Modal -->
            <div class="modal fade" id="myModalHistory" tabindex="-1" role="dialog" 
                 aria-labelledby="LabelHistory" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header" style="background-color:rgba(128, 191, 255,0.9);">
                            <button type="button" class="close" 
                               data-dismiss="modal">
                                   <span aria-hidden="true">&times;</span>
                                   <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title text-center" id="LabelHistory" style="font-size:25px; font-weight:bold;">
                               UPDATE ITEM USAGE
                            </h4>
                        </div>
                
            <!-- Modal Body -->
            <div class="modal-body">
                 <?php echo form_open(site_url("vetclinic/history/")) ?>
                <form action="" method="POST"><div class="form-group">
                    <span  id="ins" class="valerror"></span>
                                        <label>Item</label>
                                        <select class="form-control" id="itemid" name="itemid">
                                            <?php
                                            foreach($stock as $s){
                                                echo '<option value="'.$s['itemid'].'">'.$s['itemid'].'-'.$s['item_desc'].'</option>';
                                            }
                                            ?>
                                        </select> <br />
                    <label for="qty_used">Quantity</label>
                      <input type="number" class="form-control globalDisable" id="qty_used" name="qty_used" placeholder="Quantity"/>

               
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Cancel
                </button>
                <button type="submit" id="sbmtMyItem" class="btn btn-primary" name="itemuse" onclick="">
                    Update
                </button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
</div> 
</body>
    <script>
function myFunction() {
    location.reload();
}
</script>
</html>