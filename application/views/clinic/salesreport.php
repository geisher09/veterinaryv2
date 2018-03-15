<!DOCTYPE html>
<head>
    <link href="<?php echo base_url('assets/css/salesreport.css'); ?>" rel="stylesheet" type="text/css"  />
</head>
<body>
    <h1><?php echo ucwords($_GET['range']); ?> Sales Report</h1>
    <h3>Items Sold</h3>
    <table>
        <tr>
            <th><strong>Item</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Total</strong></th>
        </tr>
        <?php
            if(isset($itemsReport)){
                foreach($itemsReport as $i){
                    echo '<tr>
                            <td>'.$i['desc'].'</td>
                            <td>'.$i['qty'].'</td>
                            <td>'.$i['total'].'</td>
                          </tr>';
                }
            }
        ?>
    </table>
    <br />
    <br />
    <br />
    <h3>Services Rendered</h3>
    <table>
        <tr>
            <th><strong>Service</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Total</strong></th>
        </tr>
        <?php
            if(isset($servReport)){
                foreach($servReport as $s){
                    echo '<tr>
                            <td>'.$s['desc'].'</td>
                            <td>'.$s['qty'].'</td>
                            <td>'.$s['total'].'</td>
                          </tr>';
                }
            }
        ?>
    </table>
</body>