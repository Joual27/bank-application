<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_bank";
  
  $cnx = new mysqli($servername, $username, $password, $db_name);
  
      if (!$cnx){
          die("connection failed : " . mysqli_error($cnx));
      }else{
        //   echo "connected successfully <br>";
      }
?>