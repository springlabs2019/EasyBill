<?php

$con = mysql_connect("localhost","root@localhost","");
     if(!$con){
           die("Database Connection failed".mysql_error());
}else{
$db_select = mysql_select_db("billing_process", $con);
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{

   }
}

$query = "select * from invoice";
//$result = mysql_query("SELECT * FROM invoice");
$query = "select * from invoiceitems";

$query2 = "select * from  items_details";
$result2 = mysql_query("SELECT * FROM items_details");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<br>
<br>
<?php

$invoiceno =isset( $_GET['invoiceno'])?$_GET['invoiceno'] : ''; 


// $result = mysql_query("SELECT * FROM invoice
// INNER JOIN invoiceitem ON invoice.invoiceno = invoiceitem.invoiceno WHERE invoice.invoiceno = '$invoiceno'");

$result1 = mysql_query("SELECT * FROM invoice WHERE invoiceno = '$invoiceno'");


if($invoice = mysql_fetch_assoc($result1)){
?>
<!-- new -->
<div class="container">

<div id="ui-view" data-select2-id="ui-view">
<div>
        <div class="card">
            <div class="card-header">Invoice
                <strong><?php echo $invoice["invoiceno"]; ?></strong>
                <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true" >
                    <i class="fa fa-print"></i> Print</a>
                
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong>Albatross</strong>
                        </div>
                        <div>No 110/82, New Polise Station Road,</div>
                        <div>K V Layout, Krishnarajapuram, </div>
                        <div> Bangalore-560036</div>
                        <div>Email: </div>
                        <div>Phone: +91 9071321926 </div>
                    </div>
                    <div class="col-sm-4">
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong><?php echo $invoice["clientname"]; ?></strong>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <h6 class="mb-3">Details:</h6>
                        <div>Invoice
                            <strong><?php echo $invoice["invoiceno"]; ?></strong>
                        </div>
                        <div>
                            <b>Invoice Date :<?php echo $invoice["invoicedate"]; ?></div>
                        <div>
                            Due Date :<?php echo $invoice["duedate"]; ?></div>
                        <div>
                            P O Number :<?php echo $invoice["p_o_number"]; ?></div>
                            <div>

                            P O Date :<?php echo $invoice["p_o_date"]; ?>
                        <div>
                            Payment Terms : <?php echo $invoice['paymentterms'];?>
                        </div>
                    </div>
                </div>

</div>
<?php
}
?>

<div class="container">

                    
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th class="center">Qty</th>
                                    <th class="center">Price</th>
                                    <th class="right">Discount</th>
                                    <th class="center">SGST</th>
                                    <th class="center">CGST</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <?php

                $invoiceno =isset( $_GET['invoiceno'])?$_GET['invoiceno'] : ''; 


                // $result = mysql_query("SELECT * FROM invoice
                // INNER JOIN invoiceitem ON invoice.invoiceno = invoiceitem.invoiceno WHERE invoice.invoiceno = '$invoiceno'");

                 $result1 = mysql_query("SELECT * FROM invoiceitem WHERE invoiceno = '$invoiceno'");
                // echo "vaule", $result;
                $i=0;
                while($invoice = mysql_fetch_assoc($result1)) {
                    // $i=0;     
                    ?>
                            <tbody>
                                <tr>  
                                    <td class="left"><?php echo $invoice['item'];?></td>
                                    <td class="right"><?php echo $invoice['quantity'];?></td>
                                    <td class="right"><?php echo $invoice['price'];?></td>
                                    <td class="right"><?php echo $invoice['discount'];?></td>
                                    <td class="right"><?php echo $invoice["sgst"]; ?></td>
                                    <td class="right"><?php echo $invoice["cgst"]; ?></td>
                                    <td class="right"><?php echo $invoice["total"]; ?></td>
                                </tr>
                            </tbody>
                            <?php
                          $i++; 
                        }
                         ?>
                        </table>
                    </div>
                    <?php 
                    $invoiceno =isset( $_GET['invoiceno'])?$_GET['invoiceno'] : ''; 


                    // $result = mysql_query("SELECT * FROM invoice
                    // INNER JOIN invoiceitem ON invoice.invoiceno = invoiceitem.invoiceno WHERE invoice.invoiceno = '$invoiceno'");
                    
                    $result1 = mysql_query("SELECT * FROM invoice WHERE invoiceno = '$invoiceno'");
                    
                    if($invoice = mysql_fetch_assoc($result1)){
                    ?>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear" style="margin-left:740px">
                                <tbody>
                                    <td class="left" >
                                            <strong>Grand Total</strong>
                                        </td>
                                        <td class="left" >
                                            <strong><?php echo $invoice["grandtotal"]; ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <?php
                    }
                    ?>
</div>
</body>
</html>