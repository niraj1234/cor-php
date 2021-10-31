<?php include "links.php";  ?>
<?php
session_start();
require('dbconn.php');
echo "Data String Format ==>  w|TotCase|NewCase|TotDeath|NewDeath|TotRecover|ActiveCase  <br>";

?>
<br>
<form action="" method="GET">
    Data India <input type="text" name="dataString" id="dataString" size="100"  value="i|">
    <button type="submit" >Update Data</button>
</form>

<form action="" method="GET">
    Data World <input type="text" name="dataString" id="dataString" size="100"  value="w|">
    <button type="submit" >Update Data</button>
</form>

<?php
if($_REQUEST['dataString'] == "" ){
    echo "Please fill Data String  w|8789|878992|187|9819|900|4798798 " ;
}else{

    $dataString     = $_REQUEST['dataString'];

    $dataString  = str_ireplace( ' ',  '|', $dataString); 
    $dataString  = str_ireplace( '+',  '', $dataString); 
    $dataString  = str_ireplace( ',',  '', $dataString); 

    $dataString  = trim(preg_replace('/\t+/', '', $dataString));

    echo "Data coming is ===> <br>";
    echo $dataString;


     $str = "w|8789|878992|187|9819|900|4798798";

     $arr = explode("|" , $dataString);

     $location         = $arr[0];
     $totalCase        = $arr[1];
     $newCase          = $arr[2];
     $totalDeath       = $arr[3];
     $newDeath         = $arr[4];
     $totalRecover     = $arr[5];
     $activeCase       = $arr[6];
     echo "<br><br>";
         
     echo $location ."<br>";
     echo $totalCase ."<br>";
     echo $newCase ."<br>";
     echo $totalDeath ."<br>";
     echo $newDeath ."<br>";
     echo $totalRecover ."<br>";
     echo $activeCase ."<br>";
    


    if($location == 'w'){
        $sqltotalCase      = "update corona_alldata set dataCount = '$totalCase' where dataKey    = 'worldTotalCase' ";
        $sqlnewCase        = "update corona_alldata set dataCount = '$newCase' where dataKey      = 'worldNewCase' ";
        $sqltotalDeath     = "update corona_alldata set dataCount = '$totalDeath' where dataKey   = 'worldTotalDeath' ";
        $sqlnewDeath       = "update corona_alldata set dataCount = '$newDeath' where dataKey     = 'worldNewDeath' ";
        $sqltotalRecover   = "update corona_alldata set dataCount = '$totalRecover' where dataKey = 'worldTotalRecovered' ";
        $sqlActiveCase     = "update corona_alldata set dataCount = '$activeCase' where dataKey   = 'worldActiveCase' ";
    
        $resulttotalCase    = mysqli_query($conn , $sqltotalCase);
        $resultnewCase      = mysqli_query($conn , $sqlnewCase);
        $resulttotalDeath   = mysqli_query($conn , $sqltotalDeath);
        $resultnewDeath     = mysqli_query($conn , $sqlnewDeath);
        $resulttotalRecover = mysqli_query($conn , $sqltotalRecover);
        $resultActiveCase   = mysqli_query($conn , $sqlActiveCase);
      
        echo "Data updation done for World Category";    
    }


    if($location == 'i'){
        $sqltotalCase      = "update corona_alldata set dataCount = '$totalCase'      where dataKey = 'indiaTotalCase' ";
        $sqlnewCase        = "update corona_alldata set dataCount = '$newCase'        where dataKey = 'indiaNewCase' ";
        $sqltotalDeath     = "update corona_alldata set dataCount = '$totalDeath'     where dataKey = 'indiaTotalDeath' ";
        $sqlnewDeath       = "update corona_alldata set dataCount = '$newDeath'       where dataKey = 'indiaNewDeath' ";
        $sqltotalRecover   = "update corona_alldata set dataCount = '$totalRecover'   where dataKey = 'indiaTotalRecovered' ";
        $sqlActiveCase     = "update corona_alldata set dataCount = '$activeCase'     where dataKey = 'indiaActiveCase' ";
    
        $resulttotalCase    = mysqli_query($conn , $sqltotalCase);
        $resultnewCase      = mysqli_query($conn , $sqlnewCase);
        $resulttotalDeath   = mysqli_query($conn , $sqltotalDeath);
        $resultnewDeath     = mysqli_query($conn , $sqlnewDeath);
        $resulttotalRecover = mysqli_query($conn , $sqltotalRecover);
        $resultActiveCase   = mysqli_query($conn , $sqlActiveCase);
      
        echo "Data updation done for India Category";    
    }


    
    if($location == 'p'){
        $sqltotalCase      = "update corona_alldata set dataCount = '$totalCase'      where dataKey = 'patnaTotalCase' ";
        $sqlnewCase        = "update corona_alldata set dataCount = '$newCase'        where dataKey = 'patnaNewCase' ";
        $sqltotalDeath     = "update corona_alldata set dataCount = '$totalDeath'     where dataKey = 'patnaTotalDeath' ";
        $sqlnewDeath       = "update corona_alldata set dataCount = '$newDeath'       where dataKey = 'patnaNewDeath' ";
        $sqltotalRecover   = "update corona_alldata set dataCount = '$totalRecover'   where dataKey = 'patnaTotalRecovered' ";
        $sqlActiveCase     = "update corona_alldata set dataCount = '$activeCase'     where dataKey = 'patnaActiveCase' ";
    
        $resulttotalCase    = mysqli_query($conn , $sqltotalCase);
        $resultnewCase      = mysqli_query($conn , $sqlnewCase);
        $resulttotalDeath   = mysqli_query($conn , $sqltotalDeath);
        $resultnewDeath     = mysqli_query($conn , $sqlnewDeath);
        $resulttotalRecover = mysqli_query($conn , $sqltotalRecover);
        $resultActiveCase   = mysqli_query($conn , $sqlActiveCase);
      
        echo "Data updation done for Patna Category";    
    }


    
    if($location == 'b'){
        $sqltotalCase      = "update corona_alldata set dataCount = '$totalCase'      where dataKey = 'biharTotalCase' ";
        $sqlnewCase        = "update corona_alldata set dataCount = '$newCase'        where dataKey = 'biharNewCase' ";
        $sqltotalDeath     = "update corona_alldata set dataCount = '$totalDeath'     where dataKey = 'biharTotalDeath' ";
        $sqlnewDeath       = "update corona_alldata set dataCount = '$newDeath'       where dataKey = 'biharNewDeath' ";
        $sqltotalRecover   = "update corona_alldata set dataCount = '$totalRecover'   where dataKey = 'biharTotalRecovered' ";
        $sqlActiveCase     = "update corona_alldata set dataCount = '$activeCase'     where dataKey = 'biharActiveCase' ";
    
        $resulttotalCase    = mysqli_query($conn , $sqltotalCase);
        $resultnewCase      = mysqli_query($conn , $sqlnewCase);
        $resulttotalDeath   = mysqli_query($conn , $sqltotalDeath);
        $resultnewDeath     = mysqli_query($conn , $sqlnewDeath);
        $resulttotalRecover = mysqli_query($conn , $sqltotalRecover);
        $resultActiveCase   = mysqli_query($conn , $sqlActiveCase);
      
        echo "Data updation done for Bihar Category";    
    }

}

// This file is first version of corona API in PHP


?>