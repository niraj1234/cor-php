<?php

include  "dbconn.php";

$result = mysqli_query($conn , "select * from corona_alldata ");
$json_array = array();

while($row = mysqli_fetch_assoc ($result)){
    $json_array[] = $row ;
}
header('Content-Type: application/json');
echo json_encode($json_array);
//mysqli_close($conn);
?>