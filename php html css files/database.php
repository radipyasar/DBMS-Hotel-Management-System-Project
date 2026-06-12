<?php
     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     
     $db_server = "localhost";
     $db_user = "root";
     $db_pass = "";
     $db_name = "hotel_project";
     $conn = "";

     try{
        $conn = mysqli_connect($db_server,
                            $db_user,
                            $db_pass,
                            $db_name);

     }catch(mysqli_sql_exception){
        echo "Couldn't connect <br>";
     }
    


   
?>