<?php

	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$dbname="easybill";
      	$usertable="clients_services";
    
    	include 'DBConnection.php';
/*	$hostname="localhost";
	$username="root@localhost";
	$password="";
	$dbname="billing_process";
    $usertable="clients_services"; */


    //user data
    $organizationtext1 = $_POST["organizationtext1"];

    $firstname = $_POST["firstname"];

    $lastname= $_POST["lastname"];

    $email = $_POST["email"];

    $weburl1 = $_POST["weburl1"];

    

    $subjecttext = $_POST["subjecttext"];

    $addresstext1 = $_POST["addresstext1"];

    $addresstext3 = $_POST["addresstext3"];

    if(!empty($_POST["postalcode1"])){
        
        $postalcode1 = $_POST["postalcode1"];
      
        
    }else{
        
        $postalcode1 = 0;
    }

    $citytext1 = $_POST["citytext1"];

    $statetext1 = $_POST["statetext1"];
    
    
    if(!empty($_POST["mobilenumbertext"])){
        
        
        
        $mobilenumbertext = $_POST["mobilenumbertext"];
        
    }else{
        $mobilenumbertext = 0;
    }
    
    
    if(!empty($_POST["altnumbertext1"])){
        
        $altnumbertext1 = $_POST["altnumbertext1"];
        
    }else{
        $altnumbertext1 = 0;
    }
    

    //$mobilenumbertext = $_POST["mobilenumbertext"];

   // $altnumbertext1 = $_POST["altnumbertext1"];
    
    

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
    
    $sql = "INSERT INTO $usertable (clientname, fname ,lname, email, weburl,  remarks, addressline01, addressline02, postalcode, city, state, mobile01, mobile02)
    VALUES ('$organizationtext1','$firstname','$lastname','$email','$weburl1','$subjecttext','$addresstext1','$addresstext3','$postalcode1','$citytext1','$statetext1','$mobilenumbertext','$altnumbertext1')";

   if ($conn->query($sql) === TRUE) {
       
       echo "<script>
                    //alert('Client details Updated!');
                    window.location.href = 'ClientsDetails.php';
                    </script>";
                    exit;
        //echo (/*'New record created successfully */'<a href="ClientsDetails.php" target="_top">Clientsdeatils</a>') ;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
$conn->close();
?>