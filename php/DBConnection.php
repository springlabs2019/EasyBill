<?php

	//Connect to specified Database
	
	$hostname="localhost";
	$username="bhaskar";
	$password="Spring@123";
	
    
    $conn = mysqli_connect($hostname,$username, $password, $dbname) ;

    if(mysqli_connect_error())
    {
        echo "Failed to connect" . mysqli_connect_error();
    }
	
	if(mysqli_ping($conn))
	{
	    
	    //echo "Connection OK!!";
	}
	else{           
	    
	    echo "Error" . mysqli_error();
    }

?>