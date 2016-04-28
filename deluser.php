<?php   

        $username = $_POST["username"];
        //$userid = $_GET["id"];
        // $_SESSION['indname'] = $indid;

        // echo $username;



       if($username  != null) {

        
        include("php/config.php"); 

        $strSQL = "DELETE FROM user WHERE username = '".$username."'";                       
        $objQuery = mysqli_query($Connection,$strSQL);

        
        
        echo "<script>alert('ลบข้อมูลลูกค้าสำเร็จ!');</script>";  
        echo "<script>location.href='userdetail.php';</script>"; 

               }

        ?>