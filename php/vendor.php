<?php

	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="localhost";
	$username="root@localhost";
	$password="";
	$dbname="billing_process";
    $usertable="vendor";


    //user data
    $Vendor_name = $_POST["Vendor_name"];

    $First_name = $_POST["First_name"];

    $Last_name= $_POST["Last_name"];

    $City= $_POST["City"];

    $E_mail = $_POST["E_mail"];

    $conn = mysqli_connect($hostname,$username, $password, $dbname) ;
	//mysqli_select_db($dbname);

    if(mysqli_connect_error())
    {
        // echo "Failed to connect" . mysqli_connect_error();
    }
	
	if(mysqli_ping($conn))
	{
	    
	    // echo "Connection OK!!";
	}
	else{           
	    
	    // echo "Error" . mysqli_error();
    }
    
    $sql = "INSERT INTO vendor (Vendor_name,First_name,Last_name, City, E_mail)
    VALUES ('$Vendor_name','$First_name','$Last_name','$City','$E_mail')";

   if ($conn->query($sql) === TRUE) {
        echo  "<script>                    
        window.location.href = 'vendordetails.php';
     </script> ";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>