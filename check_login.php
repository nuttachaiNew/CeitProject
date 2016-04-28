
<?php
	
	session_start();
	include("php/config.php");
	$strSQL = "SELECT * FROM user WHERE username = '".mysqli_real_escape_string($Connection,$_POST['Username'])."' and password = '".mysqli_real_escape_string($Connection,$_POST['Password'])."'";
	$objQuery = mysqli_query($Connection,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

	if(!$objResult)
	{
		
		echo "<script>alert('คุณกรอก Username หรือ Password ผิดกรุณากรอกใหม่อีกครั้ง!');</script>";  
        //echo "<script>location.href='Login.html';</script>";   
        echo "<script>window.history.back();</script>"; 
        exit();      

	
	}
	else
	{						

			$_SESSION["UserID"] = $objResult["username"];   // *************
			$_SESSION["Status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "Approver")
			{
				header("location:authorize.php");
			}
			else if($objResult["status"] == "User")
			{
				header("location:serviceClient.php");
			}
			else if($objResult["status"] == "Employee")
			{
				header("location:employee.php");
			}
			else if($objResult["status"] == "Admin")
			{				
				header("location:userdetail.php");
			}


	}

	mysqli_close($Connection);

?>


