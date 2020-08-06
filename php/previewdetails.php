<?php

	$dbname="easybill";
    $usertable="invoice";
    
    include 'DBConnection.php';

/*$con = mysql_connect("localhost","root","root");
     if(!$con){
           die("Database Connection failed".mysql_error());
}else{
$db_select = mysql_select_db("billing_process", $con);
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{

   }
}*/

$query = "select * from invoice";
$result = mysql_query("SELECT * FROM invoice");
$query2 = "select * from  itemsdetails";
$result2 = mysql_query("SELECT * FROM invoice");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Document</title>
    <style>
    .card {
    margin-bottom: 1.5rem
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3
}
    </style>
</head>
<body>
<div class="container">
<?php

$invoiceno =isset( $_GET['invoiceno'])?$_GET['invoiceno'] : ''; 


// $result = mysql_query("SELECT * FROM invoice
// INNER JOIN invoiceitem ON invoice.invoiceno = invoiceitem.invoiceno WHERE invoice.invoiceno = '$invoiceno'");

$result1 = mysql_query("SELECT * FROM invoice WHERE invoiceno = '$invoiceno'");


if($invoice = mysql_fetch_assoc($result1)){
?>
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header">Invoice
                    <strong><?php echo $invoice["invoiceno"]; ?></strong>
                    <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true" style="float:right">
                        <i class="fa fa-print"></i> Print</a>
                    <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true" style="float:right">
                        <i class="fa fa-save"></i> Save</a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong>SpringLabs </strong>
                            </div>
                            <div>42, Awesome Enclave</div>
                            <div>New York City, New york, 10394</div>
                            <div>Email: admin@bbbootstrap.com</div>
                            <div>Phone: +48 123 456 789</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong><?php echo $invoice["clientname"]; ?></strong>
                            </div>
                            <div>42, Awesome Enclave</div>
                            <div>New York City, New york, 10394</div>
                            <div>Email: admin@bbbootstrap.com</div>
                            <div>Phone: +48 123 456 789</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Details:</h6>
                            <div>Invoice :
                                <strong><?php echo $invoice["invoiceno"]; ?></strong>
                            </div>
                            <div>Invoice Date :
                                <strong><?php echo $invoice["invoicedate"]; ?></strong>
                            </div>
                            <div>Due Date :
                                <strong><?php echo $invoice["duedate"]; ?></strong>
                            </div>
                            <div>P O Number :
                                <strong><?php echo $invoice["p_o_number"]; ?></strong>
                            </div>
                            <div>P O Date :
                                <strong><?php echo $invoice["p_o_date"]; ?></strong>
                            </div>
                            <div>Payment Terms :
                                <strong><?php echo $invoice["paymentterms"]; ?></strong>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }   
                    ?>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                    <th>Item</th>
                                    <th class="center">Qty</th>
                                    <th class="center">Price</th>
                                    <th class="right">Discount %</th>
                                    <th class="center">SGST %</th>
                                    <th class="center">CGST %</th>
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
                    
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                        
                        <div class="col-lg-4 col-sm-5 ml-auto">
                        <?php 
                    $invoiceno =isset( $_GET['invoiceno'])?$_GET['invoiceno'] : ''; 
                    // $result = mysql_query("SELECT * FROM invoice
                    // INNER JOIN invoiceitem ON invoice.invoiceno = invoiceitem.invoiceno WHERE invoice.invoiceno = '$invoiceno'");
                    
                    $result1 = mysql_query("SELECT * FROM invoice WHERE invoiceno = '$invoiceno'");
                    
                    if($invoice = mysql_fetch_assoc($result1)){
                    ?>
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Grand Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong><?php echo $invoice["grandtotal"]; ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php 
                                }
                            ?>
                            <a class="btn btn-success" href="#" data-abc="true">
                                <i class="fa fa-usd"></i> Proceed to Payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


