<?php   

  
        $delindid = $_POST["indicatorID"];
        // $_SESSION['indname'] = $indid;



       if($delindid  != null) {


        // session_start();
        // mysql_connect("localhost","root","1234");
        // mysql_select_db("ceit_service");
        // mysql_query("SET NAMES UTF8");
        include("php/config.php"); 

        $strSQL = "DELETE FROM indicators WHERE indicatorID = '".$delindid."'";                       
        $objQuery = mysqli_query($Connection,$strSQL);

        
        echo "<script>alert('ลบข้อมูลตัวชี้วัดสำเร็จ!');</script>";  
        echo "<script>location.href='indicatorsdetail.php';</script>"; 

               }

        mysqli_close($Connection);       

        ?>