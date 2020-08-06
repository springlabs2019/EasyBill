<?php

	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$dbname="easybill";
    $usertable="vendor";
    
    include 'DBConnection.php';
	
	
	
/*	$hostname="localhost";
	$username="root";
	$password="root";
	$dbname="billing_process";
    $usertable="vendor";
*/

    //user data
    $Vendor_name = $_POST["Vendor_name"];

    $First_name = $_POST["First_name"];

    $weburl= $_POST["weburl"];

    $City= $_POST["City"];

    $E_mail = $_POST["E_mail"];
    
    

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
    }*/
    
    $sql = "INSERT INTO $usertable (vendorname,fname,weburl, city, email)
    VALUES ('$Vendor_name','$First_name','$weburl','$City','$E_mail')";

   if ($conn->query($sql) === TRUE) {
       
              echo "<script>
                    window.location.href = 'VendorDetails.php';
                    
                    $(function(){
  
                        Materialize.toast('Vendor details Updated!', 2200, 'rounded')

                    });  
                    Materialize.toast('Login successful', 2200, 'rounded');
                    //alert('Vendor details Updated!');
                    </script>";
                    exit;
        echo 'New record created successfully <a href="VendorDetails.php">Vendor</a>';
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>