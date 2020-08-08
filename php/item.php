<?php

	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$dbname="easybill";
    $usertable="items_details";
    
    include 'DBConnection.php';
	
/*	$hostname="localhost";
	$username="bhaskar";
	$password="Spring@123";
	$dbname="easybill";
    $usertable="itemsdetails";*/


    //user data
    $Product_name = $_POST["Product_name"];

    $Quantity = $_POST["Quantity"];

    $Price= $_POST["Price"];

    $Description= $_POST["Description"];

/*    $conn = mysqli_connect($hostname,$username, $password, $dbname) ;
	//mysqli_select_db($dbname);

    if(mysqli_connect_error())
    {
        echo "Failed to connect" . mysqli_connect_error();
    }
	
	if(mysqli_ping($conn))
	{
	    
	    echo "Connection OK!!";
	}
	else{           
	    
	    echo "Error" . mysqli_error();
    }
    */
    $sql = "INSERT INTO $usertable (itemname,quantity,price,description)
    VALUES ('$Product_name','$Quantity','$Price','$Description')";

   if ($conn->query($sql) === TRUE) {
       
            echo "<script>                    
                    window.location.href = 'itemsdetails.php';
                    
/*                    $(function(){
  
                        Materialize.toast('Item details Updated!', 2200, 'rounded')

                    }); */ 
                 </script> ";
                 exit;
       // echo 'New record created successfully <a href="ItemsDeatils.php">Items</a>';
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>
