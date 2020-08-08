<?php

/*$con = mysql_connect("localhost","root@localhost","");
     if(!$con){
           die("Database Connection failed".mysql_error());
}else{
$db_select = mysql_select_db("billing_process", $con);
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{

   }
}*/

	$dbname="easybill";
    $usertable="items_details";
    
    include 'DBConnection.php';

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Invoice</title>
    <style>
        .header {
  overflow: hidden;
  background-color: white;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: white;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

/* Body Css */
.row {
  display: flex;
}

.column {
  flex: 50%;
  padding: 10px;
}


    </style>
</head>
<body>
    <div class="container">
                <?php

            $invoiceno =isset( $_GET['invoiceno'])?$_GET['invoiceno'] : ''; 


            // $result = mysql_query("SELECT * FROM invoice
            // INNER JOIN invoiceitem ON invoice.invoiceno = invoiceitem.invoiceno WHERE invoice.invoiceno = '$invoiceno'");

            $result1 = mysqli_query($conn, "SELECT * FROM invoice WHERE invoiceno = '$invoiceno'");


            if($invoice = mysqli_fetch_assoc($result1)){
            ?>
        <div class="header">
            <a href="#default" class="logo"><img src="..\images\logo.png" alt="logo" style="width:400px" height="100px"></a>
            <div class="header-right">
                <a class="active" href="#home">Invoice No : <strong><?php echo $invoice["invoiceno"]; ?></strong></a><br>
                
                <a href="#contact">Date : <strong><?php echo $invoice["invoicedate"]; ?></strong></a><br>
                <a href="#about">Due Date : <strong><?php echo $invoice["duedate"]; ?></strong></a>
            </div>
        </div>
        <hr style="height:5px;border-width:0;color:black;background-color:black">
        <div class="row">
                        <div class="column">
                            <h3><strong>SpringLabs Pvt ltd</strong></h3>
                            <h4><img src="..\images\Home_icon.png" alt="icon" width="20px" height="20px"> &nbsp;#320/1, Opp to Govt. College,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;K R Puram, Bengaluru -36</h4>
                            <h4><img src="..\images\smartphone-call.png" alt="icon" width="20px" height="20px"> &nbsp; +91 8792830184 / +91 9538402134</h4>
                        </div>
                        <div class="column">
                        <h3 width="20px" height="20px">Bill To:</h3>
                        &nbsp;<img src="..\images\user.png" alt="icon" width="20px" height="20px"> &nbsp;<strong><?php echo $invoice["clientname"]; ?></strong>
                        <h4><img src="..\images\Home_icon.png" alt="icon" width="20px" height="20px"> &nbsp;#320/1, Opp to Govt. College,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;K R Puram, Bengaluru -36</h4>
                        </div>
                        <!-- <div class="column">
                            
                        </div> -->
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

 $result1 = mysqli_query($conn, "SELECT * FROM invoiceitem WHERE invoiceno = '$invoiceno'");
// echo "vaule", $result;
$i=0;
while($invoice = mysqli_fetch_assoc($result1)) {
    // $i=0;     
    ?>
            <tbody>
                <tr>  
                    <td class="left"><strong><?php echo $invoice['item'];?></strong></td>
                    <td class="right"><strong><?php echo $invoice['quantity'];?></strong></td>
                    <td class="right"><strong><?php echo $invoice['price'];?></strong></td>
                    <td class="right"><strong><?php echo $invoice['discount'];?></strong></td>
                    <td class="right"><strong><?php echo $invoice["sgst"]; ?></strong></td>
                    <td class="right"><strong><?php echo $invoice["cgst"]; ?></strong></td>
                    <td class="right"><strong><?php echo $invoice["total"]; ?></strong></td>
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
                    
                    $result1 = mysqli_query($conn, "SELECT * FROM invoice WHERE invoiceno = '$invoiceno'");
                    
                    if($invoice = mysqli_fetch_assoc($result1)){
                    ?>
                    <div>
                    <h3 style="float:right; margin-right: 80px;" >Grand Total : <strong><img src="..\images\rupee-indian.png" alt="icon" width="20px" height="20px"> <?php echo $invoice["grandtotal"]; ?></strong></h3>
                    <strong> Note:</strong>
                        <br>1.Invoice has to be sign and inwarded when job completed<br>
                            2.Payment has to made with in 30 Days of bill submited date
                            
                    </div>
                            <?php 
                                }
                            ?>
<!-- Table --><br>
<div>
<h5>
    Account Details : SpringLabs Pvt Ltd<br>
    A/C: 149XXXXXXXXXX18<br>
    IFSC Code : ANDXXXXX491<h5>
</div>
</div> 
 
</div>



</body>
</html>