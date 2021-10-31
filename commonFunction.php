<?php

class Common
{
  public function uploadData($connection,$slno,$districtCode,$districtName,$totalConfirmed,$totalActive, $totalRecovered,$totalDeath,$newCases,$newActive,$newRecovered,$newDeath)
  {

    $sql = "insert into corona_bihardistrict ( slno , districtCode , districtName , totalConfirmed , totalActive , totalRecovered , totalDeath , newCases , newActive , newRecovered , newDeath ) values ( '$slno' , '$districtCode' , '$districtName' , '$totalConfirmed' , '$totalActive' , '$totalRecovered' , '$totalDeath' , '$newCases' , '$newActive' , '$newRecovered' , '$newDeath' )" ;
    echo "$sql" ;
    $result  = mysqli_query($connection , $sql);
    return $result;
 //     $mainQuery = "INSERT INTO  corona_biharDistrict SET slno = '$slno', districtCode = '$districtCode' , districtName = '$districtName' , totalConfirmed = '$totalConfirmed , totalActive = '$totalActive' , totalRecovered = '$totalRecovered' , totalDeath = '$totalDeath' , newCases = '$newCases' , newActive = '$newActive' , newRecovered = '$newRecovered' , newDeath = '$newDeath' "  ;
 //     $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
 //     return $result1;
  }


  public function deleteOldDistrictData($connection)  
  {
    $sql = " delete from corona_bihardistrict " ;
    echo "$sql" ;
    $result  = mysqli_query($connection , $sql);
    return $result;
  }




  public function coronaAllDataInsert($connection , $dataKey , $dataCount , $dataName )
  {
    $sql = "insert into corona_alldata ( dataKey , dataCount , dataName ) values ( '$dataKey' , '$dataCount' , '$dataName' )" ;
    echo "$sql" ;
    $result  = mysqli_query($connection , $sql);
    return $result;
  }

public function deleteOldCoronaAllData($connection)  
  {
    $sql = " delete from corona_alldata " ;
    echo "$sql" ;
    $result  = mysqli_query($connection , $sql);
    return $result;
  }




}

?>