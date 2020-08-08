<?php

$dbname="easybill";
$usertable="invoicedetails";
    
include 'php/DBConnection.php';


//$conn = mysqli_connect("localhost","bhaskar","Spring@123", "easybill");
/*     if(!$con){
           die("Database Connection failed".mysql_error());
}else{
$db_select = mysql_select_db("easybill", $conn);
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{

   }
}*/


?>
<!-- Graph  -->
<?php
 
 $dataPoints = array(
     array("y" =>  5, "label" => "Jan"),
     array("y" =>  10, "label" => "Feb"),
     array("y" =>  21, "label" => "Mar"),
     array("y" =>  15, "label" => "Apr"),
     array("y" =>  25, "label" => "May"),
     array("y" =>  20, "label" => "Jun"),
     array("y" =>  0, "label" => "Jul")
 );
 
 ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    
    
     <!-- Bootstrap CSS CDN -->
     <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
     <!-- Our Custom CSS -->
     <link rel="stylesheet" href="css\invoice.css">
    
     
      <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         
     </script>
     <!-- Graph -->
     <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Invoice count on Months"
	},
	axisY: {
		title: "Number of Invoice"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
     <style>
.row {
  display: flex;
}

.column {
  flex: 50%;
  padding: 5px;
}

        /*Bottom Strip Nav Bar*/
        body {margin: 0;}
        
        ul.topnav {
          list-style-type: none;
          margin-top: 10px;
          border-radius: 10px;
          padding: 0;
          overflow: hidden;
          background-color: #083551;
          text-align: center;
          color:white;
        
        }
        
        ul.topnav li {float: left;}
        
        ul.topnav li a {
          display: block;
          color: white;
          text-align: center;
          padding: 20px 30px;
          text-decoration: none;
        }
        
        ul.topnav li a:hover:not(.active) {background-color: #092d44;}
        ul.topnav li a:hover:not(.active) {color: white;}
        
        ul.topnav li a.active {background-color: #092d44;}
        ul.topnav li a.active {color: white;}
        
        
        ul.topnav li.right {float: right;}
        
        @media screen and (max-width: 600px) {
          ul.topnav li.right, 
          ul.topnav li {float: none;}
        }
          </style>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 style="margin-left:20px;">Easy Billing</h3>
                </div>
    
                <ul class="list-unstyled components">
                    <p></p>
                    <li class="active">
                    <a href="index.php"  aria-expanded="false"><i class="material-icons">&#xe871;</i>&nbsp;Dashboard</a><br>
                      <!--  <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="php\clientdetails.php"><i style="font-size:15px" class="fa">&#xf0c0;</i>&nbsp;Client's</a><br>
                    </li>
                    <li>
                        <a href="php\vendordetails.php"><i style='font-size:15px' class='fas'>&#xf500;</i> &nbsp;Vendor</a><br>
                    </li>
                    <li>
                        <a href="php\invoicedetails.php"><i style="font-size:15px" class="fa">&#xf24a;</i>&nbsp;Invoice</a><br>
                    </li>
                    <li>
                        <a href="php\itemdetails.php"><i style="font-size:15px" class="fa">&#xf0e8;</i>&nbsp;Items</a><br>
                    </li>
                </ul>
                <!--
                <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">Bank details</a></li>
                    <li><a href="#" class="article">Setting</a></li>
                </ul>-->
            </nav><?php
            $countinvoice = mysqli_query($conn, "select count(1) FROM invoice");
            $countclients = mysqli_query($conn,"select count(1) FROM clients_services");
            $countvendor = mysqli_query($conn,"select count(1) FROM vendor");

            $row1 = mysqli_fetch_array($countinvoice);
            $row2 = mysqli_fetch_array($countclients);
            $row3 = mysqli_fetch_array($countvendor);

            $totalinvoice = $row1[0];
            $totalclients = $row2[0];
            $totalvendor = $row3[0];
            
?>
            <div id="content">
    
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
    
                         <div class="navbar-header">
                            <button  id="sidebarCollapse" style="background-color:#083551; color:white;" >
                                <div class="glyphicon glyphicon-arrow-left"></div>
                                <div class="glyphicon glyphicon-arrow-right"></div>
                              </button>
                              
                        </div>

    
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                <a href="#" class="btn btn-info btn-lg" style="background-color:#083551; font-size:15px;">Dashboard</a> 
                                    
                                </ul>
                            </div>
                    </div>
                </nav>
                
                
                
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">Total Number of Invoices</h5>
                            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                            <a href="php\invoicedetails.php" class="btn btn-primary" style="width:180px;"><?php echo $totalinvoice; ?></a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body" style="text-align:center;" >
                            <h5 class="card-title">Total Number of Clients</h5>
                            <a href="php\clientdetails.php" class="btn btn-primary" style="width:180px;" ><?php echo $totalclients; ?></a>
                        </div>
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">Total Number of Vendors</h5>
                            <a href="php\vendordetails.php" class="btn btn-primary" style="width:180px;"><?php echo $totalvendor; ?></a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="column">
                    <br>
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
                <div class="column">
                <?php 
                $topfive = mysqli_query($conn, "SELECT clientname,invoiceno,grandtotal FROM invoice WHERE grandtotal ORDER BY grandtotal DESC LIMIT 5;");
                ?>
                <br>
                <h5 style="textalign:ceter">Top 5 Clients </h5>
                <table class="table table-hover table-gray">
                    <thead>
                        <tr>
                        <th scope="col">Client Name</th>
                        <th scope="col">Invoice No</th>
                        <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <?php
                        $i=0;
                        while($topfiveclients = mysqli_fetch_assoc($topfive)) {
                    ?>
                    <tbody>
                        <tr>
                        
                        <td><?php echo $topfiveclients["clientname"]; ?></td>
                        <td><?php echo $topfiveclients["invoiceno"]; ?></td>
                        <td><?php echo $topfiveclients["grandtotal"]; ?></td>
                        </tr>
                    </tbody>
                    <?php
                    $i++; 
                    }
                    ?>
                    </table>
                </div>
                </div>
                
                <div class="container" style="width: 1000px;">
                    
                  
                <!--Client's requiremts-->

                        <!--Bottom Strip Start-->

                        <ul class="topnav">
                            <li><a class="active" href="php\clientdetails.php"><i style="font-size:15px;" class="fa">&#xf0c0;</i>&nbsp;Clients</a></li>
                            <li><a href="php\vendordetails.php"><i style='font-size:15px' class='fas'>&#xf500;</i> &nbsp;Vendor</a></li>
                            <li><a href="php\invoicedetails.php"><i style="font-size:15px" class="fa">&#xf24a;</i>&nbsp;Invoice</a></li>
                            <li><a href="php\itemdetails.php"><i style="font-size:15px" class="fa">&#xf0e8;</i>&nbsp;items</a></li>
                          </ul>
                        <!--Bottom Strip Close-->
                          
                    </body>
                </html>       
