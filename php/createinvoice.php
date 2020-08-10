<?php

	$dbname="easybill";
    $usertable="items_details";
    
    include 'DBConnection.php';
    

/*  $con = mysql_connect("localhost","root@localhost","");
      if(!$con){
            die("Database Connection failed".mysql_error());
  }else{
  $db_select = mysql_select_db("billing_process", $con);
      if(!$db_select){
            die("Database selection failed".mysql_error());
  }else{

    }
  }
*/
  $query = "select * from items_details ";
  $queryitems = "select * from items_details ";

  $queryclients = "select * from  clients_services ";

  $resultclinets = mysqli_query($conn, $queryclients);
  $resultitems = mysqli_query($conn, $queryitems);

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
  <style>
  .column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
  </style>
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- Our Custom CSS -->
     <link rel="stylesheet" href="..\css\invoice.css">
    
       
        <script language="javascript">
		function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    if (rowCount < 10) { // limit the user from creating fields more than your limits
        var row = table.insertRow(rowCount);
        
        var colCount = table.rows[0].cells.length;
        row.id = 'row_'+rowCount;
        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;            
        }
       var listitems= row.getElementsByTagName("input")
            for (i=0; i<listitems.length; i++) {
              listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
            }
    } else {
        alert("Maximum Passenger per ticket is 10.");

    }
}

function deleteRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    for (var i = 0; i < rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if (null !== chkbox && true === chkbox.checked) {
            if (rowCount <= 1) { // limit the user from removing all the fields
                alert("Cannot Remove all the Passenger.");
                break;
            }
            table.deleteRow(i);
            rowCount--;
            i--;
        }
    }
}

//grand total calculation
function calculate(elementID) {
        
        console.log("calculate called..");
        
        var quantity = 0;
        var quantity = 0;
        
        var price = 0;
        var discount = 0;
        var sgst = 0;
        var cgst = 0;
        
        var grandTotal = 0;
        var total =0;
        
        
        var mainRow = document.getElementById(elementID);
        quantity = mainRow.querySelectorAll('[id=quantity]')[0].value;
        price = mainRow.querySelectorAll('[id=price]')[0].value;
        discount = mainRow.querySelectorAll('[id=discount]')[0].value;
        sgst = mainRow.querySelectorAll('[id=sgst]')[0].value;
        cgst = mainRow.querySelectorAll('[id=cgst]')[0].value;
        var total = mainRow.querySelectorAll('[id=total]')[0];
        var quantityPrice = quantity * price;
        var totalPrice = (quantityPrice - (quantityPrice * (discount/100)) + (quantityPrice *(sgst/100)) + (quantityPrice *(cgst/100)));
        total.value = totalPrice;
        
        console.log("total.value: " + total.value);
        
        
        var rowIdSet = new Set();
        rowIdSet.add(elementID);
        
        console.log(rowIdSet);
        
        
        
        //javascript code
        
        var invoiceTable = document.getElementById('dataTable');
        
        //gets rows of table
        var rowLength = invoiceTable.rows.length;
        
        console.log("rowLength: " + rowLength);
        
        var totalValue = 0;
        
        //loops through rows    
        for (i = 0; i < rowLength; i++){
            
            var row = document.getElementById("row_"+ i);
            
            totalValue = row.querySelectorAll('[id=total]')[0].value;
        
           //gets cells of current row
           //var invoiceCells = invoiceTable.rows.item(i).cells;
           grandTotal = +grandTotal + +totalValue;
           
           console.log("grandTotal: " + grandTotal);
         

        }
                
        var Grand_Total = document.getElementById('grandtotal');
                Grand_Total.value = grandTotal;
                
                
    }


    </script>
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
                        <a href="..\index.php"  aria-expanded="false"><i class="material-icons">&#xe871;</i>&nbsp;Dashboard</a><br>
                      <!--  <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="clientdetails.php" ><i style="font-size:15px" class="fa">&#xf0c0;</i>&nbsp;Client's</a><br>
                    </li>
                    <li>
                        <a href="vendordetails.php"><i style='font-size:15px' class='fas'>&#xf500;</i> &nbsp;Vendor</a><br>
                    </li>
                    <li>
                        <a href="invoicedetails.php" aria-expanded="true"><i style="font-size:15px" class="fa">&#xf24a;</i>&nbsp;Invoice</a><br>
                    </li>
                    <li>
                        <a href="itemdetails.php"><i style="font-size:15px" class="fa">&#xf0e8;</i>&nbsp;Items</a><br>
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

                <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="float:left;">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            
                        </div>
    
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                               
                               <a href="invoicedetails.php" class="btn btn-info btn-lg" style="background-color:#083551; font-size:15px;"> Close </a> 
                            </ul>
                        </div>
                </div>
            </nav>
            
            <Form action="invoice.php" method="POST">
                <lable for="Clients"style="margin-left:10px;"><strong>Client's Name</strong></lable><br><br>

                <select id="clientname" name="clientname" placeholder="Enter the Client's Name.." style="width: 300px; height: 30px; border-radius: 5px; margin-left: 10px;"> 
                <?php while($rows = mysqli_fetch_array($resultclinets)):; ?>
                <option><?php echo $rows[0]; ?></option>
                <?php  endwhile; ?>
                </select>
    
            <!-- <hr> -->
            <div class="form-row">
            <div class="column"><!--
            <div class="form-group" style="width:300px;">
                <label for="Invoice">Invoice No</label>
                <input type="number" class="form-control" id="Invoice_no" name="Invoice_no" placeholder="Invoice Number">
              </div>-->
              <div class="form-group " style="width:300px;">
                <label for="In_date">Invoice Date</label>
                <input type="date" class="form-control" id="invoicedate" name="invoicedate" placeholder="Invoice Date">
              </div>
              <div class="form-group " style="width:300px;">
                <label for="Due_date">Due Date</label>
                <input type="date" class="form-control" id="duedate" name="duedate" placeholder="Due Date">
              </div>
            </div>
            </div>
            <div class="column">
            <div class="form-row">
                <div class="form-group " style="width:300px;">
                    <label for="P_O">P.O Number</label>
                    <input type="number" class="form-control" id="p_o_number" name="p_o_number" placeholder="P.O. Number">
                  </div>
                  <div class="form-group " style="width:300px;">
                    <label for="P_O_date">P.O Date</label>
                    <input type="date" class="form-control" id="p_o_date" name="p_o_date" placeholder="P.O Date">
                  </div>
                  <div class="form-group " style="width:300px;">
                    <label for="Payment_terms">Payment Terms</label>
                    <input type="text" class="form-control" id="paymentterms" name="paymentterms" placeholder="Payment_terms">
                  </div>
            </div>  
            </div>
                            
                <!--New Adding Items-->
    <input type="button" value="Add New Item" onclick="addRow('dataTable')" />

    <input type="button" value="Delete Item" onclick="deleteRow('dataTable')" style="margin-left: 50px;"/>

    <table class="table table-bordered">   
    <thead>
    
        <tr>
            <th><input type="checkbox" name="chk"/></th>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Discount %</th>
            <th>SGST %</th>
            <th>CGST %</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody id="dataTable" class="form"  border="1" >
        <tr id='row_0'>
			<td style="width: 10px;"><input type="checkbox" name="chk[]"/></td>
			<td >
            <select name="item[]" id="item" style="width: 100px;">
            <?php while($rows = mysqli_fetch_array($resultitems)):; ?>
                <option><?php echo $rows[0]; ?></option>
                <?php  endwhile; ?>
            <select>
            </td >
            <td ><input type="number" name="quantity[]" id="quantity" oninput="calculate('row_0')" style="width:100px;"/></td>
            <td ><input type="number" step="0.01" name="price[]" id="price" oninput="calculate('row_0')" style="width:100px;"/></td>
            <td ><input type="number" step="0.01" name="discount[]" id="discount" oninput="calculate('row_0')" style="width:100px;"/></td>
            <td ><input type="number" step="0.01" name="sgst[]" id="sgst" oninput="calculate('row_0')" style="width:100px;"/></td>
            <td ><input type="number" step="0.01" name="cgst[]" id="cgst" oninput="calculate('row_0')" style="width:100px;"/></td>
            <td ><input type="number" step="0.01" name="total[]" id="total" style="width:100px;"/></td>
		</tr>
        </tbody> 
    </table>
    
    <div class="form-group col-md-3">
        <label for="Grand_Total" style="margin-left: 800px;">Grand_Total</label>
        <input type="number" class="form-control" step="0.01" id="grandtotal" name="grandtotal"  placeholder="Grand Total" style="margin-left: 800px;">

      </div>

      <input type="submit" name="submit" value="Save" style="background-color: #092d44; margin-left: 100px; margin-top:50px; color:white">
        </form>
        </div>
    </div>
    </div>

    <!--Preview Java Script-->
        <script type="text/javascript">
            function printlayer(Layer)
            {
                var generator = window.open(",'name',");
                var layertext = document.getElementById(Layer);
                generator.document.write(layertext.innerHTML.replace("Print Me"));

                generator.document.close();
                generator.print();
                generator.close();
            }
        </script>



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
        <!--Calculation Script-->
        <script>     
            
            //document.getElementById('date-field').value = new Date().toISOString().slice(0, 10);
                 
            $(document).ready(function() {
            var date = new Date();
        
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            
            var prevmonth = date.getMonth();
            var nextMonth = date.getMonth() + 2;
            
        
            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            
            if (prevmonth < 10) prevmonth = "0" + prevmonth;
            
            if (nextMonth < 10) nextMonth = "0" + nextMonth;
            
        
            var today = year + "-" + month + "-" + day; 
            
            var nextMonthToday = year + "-" + nextMonth + "-" + day; 
            var prevMonthToday = year + "-" + prevmonth + "-" + day; 
            
            $("#invoicedate").attr("value", today);
            $("#duedate").attr("value", nextMonthToday);
            $("#p_o_date").attr("value", prevMonthToday);
            
            
            });
            
            </script>


</body>
</html>