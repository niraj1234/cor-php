<?php
  
  $db_host = "localhost" ;
  $db_user = "biharxyz_coronau" ;
  $db_pass = "Corona_55p" ;
  $db_name = "biharxyz_coronadb" ;  

  $conn = mysqli_connect($db_host , $db_user ,$db_pass , $db_name);

if($conn){
//    echo "Connection to $db_name SUCCESSFUL !!";
}else{
    echo "Database connection Failed ???";
    die("connection failed");
}

?>