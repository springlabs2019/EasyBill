<?php

	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="localhost";
	$username="root@localhost";
	$password="";
	$dbname="billing_process";
    $usertable="clients_services";


    //user data
    $organizationtext1 = $_POST["organizationtext1"];

    $firstname = $_POST["firstname"];

    $lastname= $_POST["lastname"];

    $email = $_POST["email"];

    $weburl1 = $_POST["weburl1"];

    

    $subjecttext = $_POST["subjecttext"];

    $addresstext1 = $_POST["addresstext1"];

    $addresstext3 = $_POST["addresstext3"];

    $postalcode1 = $_POST["postalcode1"];

    $citytext1 = $_POST["citytext1"];

    $statetext1 = $_POST["statetext1"];

    $mobilenumbertext = $_POST["mobilenumbertext"];

    $altnumbertext1 = $_POST["altnumbertext1"];

    $conn = mysqli_connect($hostname,$username, $password, $dbname) ;
	//mysqli_select_db($dbname);

    if(mysqli_connect_error())
    {
       // echo "Failed to connect" . mysqli_connect_error();
    }

	if(mysqli_ping($conn))
	{
	    
	    //echo "Connection OK!!";
	}
	else{           
	    
	    //echo "Error" . mysqli_error();
    }
    
    $sql = "INSERT INTO clients_services (organizationtext, fname ,lname, e_mailtext, weburltext,  subject, addresstext, addresstext2, postalcode, citytext, statetext, mobilenumbertext, altnumbertext)
    VALUES ('$organizationtext1','$firstname','$lastname','$email','$weburl1','$subjecttext','$addresstext1','$addresstext3','$postalcode1','$citytext1','$statetext1','$mobilenumbertext','$altnumbertext1')";

   if ($conn->query($sql) === TRUE) {
        echo "<script>                    
        window.location.href = 'clientdetails.php';
     </script> ";
     exit;
    } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
$conn->close();
?>