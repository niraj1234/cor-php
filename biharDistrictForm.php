<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Excel(CSV) Bihar District</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "links.php";  ?>


<div class="jumbotron text-center">
    <h1>Upload Excel(CSV) Bihar District</h1>
    <p>Bihar District Upload Excel[csv] File</p>
</div>
<div class="container">
    <form action="biharDistrictUpload.php" method="post" enctype="multipart/form-data">
       <div class="row">
           <div class="col-md-4">
               <div class="form-group">
                   <input type="file" name="excelDoc" id="excelDoc" class="form-control" />
               </div>
           </div>
           <div class="col-md-4">
               <input type="submit" name="uploadBtn" id="uploadBtn" value="Upload Bihar csv" class="btn btn-success" />
           </div>
       </div>
    </form>
</div>
</body>
</html>
