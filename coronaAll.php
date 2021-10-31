<?php include "links.php";  ?>

<?php
session_start();
require('dbconn.php');


// Insert Operation  START
if( isset($_REQUEST['insert'])){   
  if( ($_REQUEST['dataKey'] == "" ) || ($_REQUEST['dataCount'] == "" ) || ($_REQUEST['dataName'] == "" ) ){
    echo "Please fill all the data in form !" ;
    }else{
      $dataKey     = $_REQUEST['dataKey'];
      $dataCount     = $_REQUEST['dataCount'];
      $dataName  = $_REQUEST['dataName'];
      
      $sql = "insert into corona_alldata ( dataKey , dataCount , dataName ) values ( '$dataKey' , '$dataCount' , '$dataName' )" ;
      $result  = mysqli_query($conn , $sql);

      if($result){
        echo "New Record Inserted Successfully !!!" ;
      }else{
        echo "Data insertion FAILED ??";
      }
    }
 } 
 // Insert Operation END


// Update Operation START
if( isset($_REQUEST['update'])){   
  if( ($_REQUEST['dataKey'] == "" ) || ($_REQUEST['dataCount'] == "" ) || ($_REQUEST['dataName'] == "" ) ){
    echo "Please fill all the data in form !" ;
    }else{
      $dataKey     = $_REQUEST['dataKey'];
      $dataCount     = $_REQUEST['dataCount'];
      $dataName  = $_REQUEST['dataName'];
      
      $sql = "update corona_alldata set dataCount = '$dataCount' , dataName = '$dataName'  where dataKey = '{$_REQUEST['dataKey']}' ";
      $result  = mysqli_query($conn , $sql);

      if($result){
        echo "Record Updated Successfully !!!";
      }else{
        echo "Data Updation FAILED ??";
      }
    }
 } 
// Update Operation END



 // Delete operation START
if(isset($_REQUEST['delete'])){
  $sql = "delete from corona_alldata where dataKey = '{$_REQUEST['dataKey']}' ";
  $result  = mysqli_query($conn , $sql);
  if($result){
      echo "Record deleted successfully with id :- ".$_REQUEST['dataKey'] ;
  }else{
    echo "Record deletion FAILED ??" ;
  }
}
// Delete operation END

?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Corona Snap</title>
  </head>
  <body>

  <div class="container">
  <h5>Add| Edit Data</h5><hr>


  <div class="row">

       <?php  
        if(isset($_REQUEST['updateForm'])){ 
            $sql = "select * from corona_alldata where dataKey = '{$_REQUEST['dataKey']}'";
            $result = mysqli_query($conn , $sql);
            $row = mysqli_fetch_assoc($result);          
        ?>
        <div class="col-sm-3">
           <form action="" method="POST">
                <div class="form-group"><label for="name">Data&nbsp;Key : </label><input type="text" class="form-control" name="dataKey" id="dataKey"  value="<?php if(isset($row["dataKey"])){ echo $row["dataKey"];} ?>" ></div>
                <div class="form-group"><label for="name">Data&nbsp;Count : </label><input type="text" class="form-control" name="dataCount" id="dataCount" value="<?php if(isset($row["dataCount"])){ echo $row["dataCount"];} ?>"></div>
                <div class="form-group"><label for="name">Data&nbsp;Name : </label><input type="text" class="form-control" name="dataName" id="dataName" value="<?php if(isset($row["dataName"])){ echo $row["dataName"];} ?>"></div>
                <input type="hidden" name="dataKey" value="<?php  echo $row['dataKey']?>">
                <button type="submit" class="btn btn-primary" name="update" >Update Data</button>
           </form>
         </div>

      <?php }else{ ?>

        <div class="col-sm-3">
           <form action="" method="POST">
                <div class="form-group"><label for="name">Data Key : </label><input type="text" class="form-control" name="dataKey" id="dataKey"></div>
                <div class="form-group"><label for="name">Data Count : </label><input type="text" class="form-control" name="dataCount" id="dataCount"></div>
                <div class="form-group"><label for="name">Data Name : </label><input type="text" class="form-control" name="dataName" id="dataName"></div>
                <button type="submit" class="btn btn-primary" name="insert" >Add Data</button>
           </form>
         </div>

      <?php } ?>
 
 




         <div class="col-sm-7 offset-sm-2">
           <h2>Corona All Snap Data </h2>
           <?php
           $sql = "select * from corona_alldata order by dataKey asc" ;
           $result = mysqli_query($conn,$sql);
 
          if(mysqli_num_rows($result)>0){
              echo '<table class="table">';
              echo "<thead>";
                  echo "<tr>";
                      echo "<th>Data&nbsp;Key</th><th>Data&nbsp;Count</th><th>Data&nbsp;Name</th>";
                  echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
     
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>";
                  echo "<td>".$row["dataKey"]."</td>";
                  echo "<td>".$row["dataCount"]."</td>";
                  echo "<td>".$row["dataName"]."</td>";
                  echo '<td><form action="" method="POST" ><input type="hidden" name="dataKey" value='.$row['dataKey'].'> <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete" ></form></td>';     
                  echo '<td><form action="" method="POST" ><input type="hidden" name="dataKey" value='.$row['dataKey'].'> <input type="submit" class="btn btn-sm btn-info" name="updateForm" value="Edit" ></form></td>';           
              echo "</tr>";
            }
     
            echo "</tbody>";
            echo '</table>';

          }else{
              echo "Zero Result !!" ;
          }
          ?>

         </div> 

      </div>  
   </div> <!-- container ends -->










    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
