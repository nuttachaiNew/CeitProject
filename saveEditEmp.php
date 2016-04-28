<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<?php

    $fname = $_POST["fullname"];
    $empcode = $_POST["employeecode"];
    $department = $_POST["department"];
    $telno = $_POST["telephone"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    $pass = $_POST["password"];
    //$position = $_POST["Position"];



    session_start();

    include("php/config.php");      

        
        $strSQL = "UPDATE user
                   SET  name =  '$fname',
                        department = '$department',
                        telno = '$telno',
                        phone = '$phone',
                        email = '$email',
                        status = '$status',
                        password ='$pass'
                   WHERE employee_id = '".$empcode."' ";                   
        $objQuery = mysqli_query($Connection,$strSQL);



        $strSQL = "UPDATE employee
                   SET  empName =  '$fname',  
                   WHERE empID = '".$empcode."' ";                   
        $objQuery = mysqli_query($Connection,$strSQL);



        

        
        echo "<script>alert('แก้ไขข้อมูลพนักงานสำเร็จ!');</script>";  
        echo "<script>location.href='Empdetail.php';</script>"; 
           
        // echo "<br> Go to <a href='Login.html'>Login page</a>";
        
    // }

    mysqli_close($Connection);
?>
</head>
</html>
