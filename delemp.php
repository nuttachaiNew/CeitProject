<?php   

        $empid = $_POST["empid"];
        //$empid = $_GET["id"];
        // $_SESSION['indname'] = $indid;

        // echo $empid;



       if($empid  != null) {


        include("php/config.php"); 

        $strSQL = "DELETE FROM user WHERE employee_id = '".$empid."'";                       
        $objQuery = mysqli_query($Connection,$strSQL);

        $strSQL = "DELETE FROM employee WHERE empID = '".$empid."'";                       
        $objQuery = mysqli_query($Connection,$strSQL);



        
        echo "<script>alert('ลบข้อมูลพนักงานสำเร็จ!');</script>";  
        echo "<script>location.href='Empdetail.php';</script>"; 

               }

        mysqli_close($Connection);       

        ?>