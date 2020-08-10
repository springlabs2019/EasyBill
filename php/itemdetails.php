<?php


	$dbname="easybill";
    $usertable="items_details";
    
    include 'DBConnection.php';
    

/*  $con = mysql_connect("localhost","root","root");
      if(!$con){
            die("Database Connection failed".mysql_error());
  }else{
  $db_select = mysql_select_db("billing_process", $con);
      if(!$db_select){
            die("Database selection failed".mysql_error());
  }else{

    }
  }*/
  
  

  $query = "select * from $usertable ";


  if(isset($_GET['page']))
  {
    $page = $_GET['page'];
  }else
  {
    $page = 1;
  }

  $num_per_page = 10;
  $start_from = ($page-1)*05;

  $records = mysqli_query($conn,"SELECT * FROM $usertable limit $start_from,$num_per_page");

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>EasyBill</title>
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
   <!-- Scarch Option Link -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- Our Custom CSS -->
     <link rel="stylesheet" href="../css/invoice.css">
     
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
     
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 style="margin-left:20px;"> Albatross</h3>
                </div>
    
                <ul class="list-unstyled components">
                    <p></p>
                    <li class="active">
                        <a href="..\index.php"  aria-expanded="false"><i class="material-icons">&#xe871;</i>&nbsp;Dashboard</a><br>
                      <!--  <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="clientdetails.php"><i style="font-size:15px" class="fa">&#xf0c0;</i>&nbsp;Client's</a><br>
                    </li>
                    <li>
                        <a href="vendordetails.php"><i style='font-size:15px' class='fas'>&#xf500;</i> &nbsp;Vendor</a><br>
                    </li>
                    <li>
                        <a href="invoicedetails.php"><i style="font-size:15px" class="fa">&#xf24a;</i>&nbsp;Invoice</a><br>
                    </li>
                    <li>
                        <a href="itemdetails.php" aria-expanded="true"><i style="font-size:15px" class="fa">&#xf0e8;</i>&nbsp;Items</a><br>
                    </li>
                </ul>
                <!--
                <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">Bank details</a></li>
                    <li><a href="#" class="article">Setting</a></li>
                </ul>-->
            </nav>
            <div id="content">
    
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
    
                        <!-- <div class="navbar-header">
                            <button  id="sidebarCollapse"    style="background-color:#083551; color:white;" >
                                <div class="glyphicon glyphicon-arrow-left"></div>
                                <div class="glyphicon glyphicon-arrow-right"></div>
                              </button>
                        </div>
     -->                <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="float:left;">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                               
                               <a href="..\html\items.html" class="btn btn-info btn-lg" style="background-color:#083551; font-size:15px;"><span class="glyphicon glyphicon-plus"></span>  New Item </a> 
                            </ul>
                        </div>
                    </div>
                </nav>      

          
          <!--Client's slection-->
          <br/>
          <div class="container" style="width: 1000px;">
           
            <!-- Default unchecked -->
            <div >
    <?php
            if(isset($_POST['save'])){
    $checkbox = $_POST['check'];
    for($i=0;$i<count($checkbox);$i++){
    $del_id = $checkbox[$i]; 
    mysqli_query($conn, "DELETE FROM $usertable WHERE itemname='".$del_id."'");
    $message = "Data deleted successfully !";
    }
    }
    
  $result = mysqli_query($conn, "SELECT * FROM $usertable limit $start_from,$num_per_page");
  ?>

<div id="snackbar"><?php 
$message = "Data deleted successfully !"; 
{ echo $message; } ?></div>
  <form method="post" action="" >
  <div class="row">          
          <!--Search button-->
          <div class="col-lg-4">
            <div class="input-group">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name" style="border-radius:5px; height:40px;">
                <button type="submit" class="btn btn-success" name="save" style="background-color:#092d44; height:40px; margin-left:50px;" onclick="SnackbarFunction()">DELETE</button>
              </div> 
          </div>
            </div><br>
  <table class="table table-bordered" id="myTable">
  <thead>
  <tr>
      <th><input type="checkbox" id="checkAl"> Select All</th>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody id="searchTable" >
  <?php
  $i=0;
  while($items_details = mysqli_fetch_assoc($result)) {
  ?>
  <tr>
      <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $items_details["Product_name"]; ?>"></td>
    <td><?php echo $items_details["itemname"]; ?></td>
    <td><?php echo $items_details["quantity"]; ?></td>
    <td><?php echo $items_details["price"]; ?></td>
    <td><?php echo $items_details["description"];?></td>
  </tr>
  <?php
  $i++; 
  }
  ?>
  </tbody>
  </table>
  <div style="margin-left:500px; margin-top:10px;">
<?php

  $It_query  = mysqli_query($conn,"select * from $usertable");

  $Itnumber = mysqli_num_rows($It_query);
  
  
  /*Getting number of record iin databses */
     $toatl_page =ceil($Itnumber/$num_per_page);
     /*echo $toatl_page;*/
     

     
     if($page>1)
     {
      echo "<a href='itemdetails.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";
     }

     for ($k=1; $k<$toatl_page;$k++)
     {
       echo "<a href=itemdetails.php?page=".$k."' class='btn btn-primary'>$k</a>";    
     }

     if($k>1)
     {
      echo "<a href='itemdetails.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";
     }
?>
</div>
  <br><br>
  <p align="center"></p>
  </form>
  
  <script>
  $("#checkAl").click(function () {
  $('input:checkbox').not(this).prop('checked', this.checked);
  });

  </script>
  </div>
      </div>
     <!-- Serach Oprion  -->
  <script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#searchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  <!--Snack Bar Script-->
  <script>
  function SnackbarFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
}
</script>
</body>
</html>
