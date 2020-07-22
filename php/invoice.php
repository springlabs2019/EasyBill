<?php 
if(isset($_POST['submit'])){

    $conn= mysqli_connect('localhost','root@localhost','','billing_process');

    $clientname = $_POST["clientname"];

    // $invoiceno = $_POST["invoiceno"];

    $invoicedate = $_POST["invoicedate"];

    $duedate = $_POST["duedate"];

    $p_o_number = $_POST["p_o_number"];

    $p_o_date = $_POST["p_o_date"];

    $paymentterms = $_POST["paymentterms"];

    // $invoice_no = $_POST["invoice_no"];

    $item = $_POST["item"];

    $quantity = $_POST["quantity"];

    $price = $_POST["price"];

    $discount = $_POST["discount"];

    $sgst = $_POST["sgst"];

    $cgst = $_POST["cgst"];

    $total = $_POST["total"];

    $grandtotal = $_POST["grandtotal"];

   

    $sql = "INSERT INTO invoice (clientname,invoicedate, duedate, p_o_number,p_o_date,paymentterms,grandtotal)
    VALUES ('$clientname','$invoicedate','$duedate','$p_o_number','$p_o_date','$paymentterms','$grandtotal')";

    $query= mysqli_query($conn,$sql);

    if($query){
        $sqlinvoice = "SELECT invoiceno FROM invoice ORDER BY invoiceno DESC LIMIT 1";

        $result = mysqli_query ( $conn , $sqlinvoice);

          
        while ($row = $result->fetch_assoc()) {
            // echo "valule" , $row['invoiceno'];
            $invoiceno = $row['invoiceno'];
          }
          
        
    //  echo "valule", count($item);
        //    echo  "vaule", $item;
         for($i = 0; $i < count($item); $i++)
         {
             $sqlInsertItem = "INSERT INTO  invoiceitem (invoiceno,item, quantity, price, discount, sgst, cgst, total) 
             VALUES('$invoiceno','{$item[$i]}','{$quantity[$i]}','{$price[$i]}','{$discount[$i]}','{$sgst[$i]}','{$cgst[$i]}','{$total[$i]}')";
            
             $result= mysqli_query($conn,$sqlInsertItem);
            echo "<script>                    
            window.location.href = 'invoicedetails.php';
         </script> ";
         }
        
    } else{

    }

}

  
?>