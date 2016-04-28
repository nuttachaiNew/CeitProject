<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<?php
session_start();

    $fname = $_POST["fullname"];
    $empcode = $_POST["employeecode"];
    $department = $_POST["department"];
    $telno = $_POST["telephone"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    // $status = $_POST["status"];
    // $img = $_POST["img"];
    // $position = $_POST["Position"];
    $img="images/".$_SESSION['UserID'].".jpg";


    // if ($_FILES["file"]["error"] > 0)
    // { echo "Error: " . $_FILES["file"]["error"] . "<br>"; }
    // else
    // {
    // echo "Upload: " . $_FILES["file"]["name"]. "<br>";
    // echo "Type: " . $_FILES["file"]["type"]. "<br>";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024). " Kb<br>";
    // echo "Stored in: " . $_FILES["file"]["tmp_name"];
    // }
    // echo "<br/>". $img;
    


    // echo $_POST['pic'];
    
    // $tmp_name = $_FILES["pic"]["name"];
    // echo $_FILES["pic"]["tmp_name"];
    
    include("php/config.php");  



    move_uploaded_file($_FILES["file"]["tmp_name"],$img);

        $strSQL = "UPDATE user
                   SET  name =  '$fname',
                        employee_id = '$empcode',
                        department = '$department',
                        telno = '$telno',
                        phone = '$phone',
                        email = '$email',                        
                        password ='$pass',
                        img =  '$img'                          
                   WHERE username = '".$_SESSION['UserID']."' ";                   
        $objQuery = mysqli_query($Connection,$strSQL);


        // echo $_FILES["pic"]["tmp_name"]
        echo "<script>alert('แก้ไขข้อมูลส่วนตัวสำเร็จ!');</script>";  
        echo "<script>location.href='Profile.php';</script>"; 
           

        
    // }

    // mysql_close();
?>
</head>
</html>
