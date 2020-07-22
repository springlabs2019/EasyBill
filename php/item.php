<?php

	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="localhost";
	$username="root@localhost";
	$password="";
	$dbname="billing_process";
    $usertable="items_details";


    //user data
    $Product_name = $_POST["Product_name"];

    $Quantity = $_POST["Quantity"];

    $Price= $_POST["Price"];

    $Description= $_POST["Description"];

    $conn = mysqli_connect($hostname,$username, $password, $dbname) ;
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
    
    $sql = "INSERT INTO items_details (Product_name,Quantity,Price,Description)
    VALUES ('$Product_name','$Quantity','$Price','$Description')";

   if ($conn->query($sql) === TRUE) {
        echo "<script>                    
        window.location.href = 'itemdetails.php';
     </script> ";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>