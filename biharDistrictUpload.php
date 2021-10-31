<?php
include  "dbconn.php";
include_once  "commonFunction.php";

$common = new Common();

if($_FILES['excelDoc']['name']) {
    $arrFileName = explode('.', $_FILES['excelDoc']['name']);
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['excelDoc']['tmp_name'], "r");
        $count = 0;

        $cleanOldData = $common->deleteOldDistrictData($conn);               

        $locationBihar         = 'b';
        $totalCaseBihar        = 0;
        $newCaseBihar          = 0;
        $totalDeathBihar       = 0;
        $newDeathBihar         = 0;
        $totalRecoverBihar     = 0;
        $activeCaseBihar       = 0;
    
        $locationPatna         = 'p';
        $totalCasePatna        = 0;
        $newCasePatna          = 0;
        $totalDeathPatna       = 0;
        $newDeathPatna         = 0;
        $totalRecoverPatna     = 0;
        $activeCasePatna       = 0;
    


        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {
                continue; // skip the heading header of sheet
            }else{
                $slno           =   $conn->real_escape_string($data[0]);
                $stateCode      =   $conn->real_escape_string($data[1]);
                $districtCode   =   $conn->real_escape_string($data[3]);
                $districtName   =   $conn->real_escape_string($data[4]);
                $totalConfirmed =   $conn->real_escape_string($data[5]);
                $totalActive    =   $conn->real_escape_string($data[6]);
                $totalRecovered =   $conn->real_escape_string($data[7]);
                $totalDeath     =   $conn->real_escape_string($data[8]);
                $newCases       =   $conn->real_escape_string($data[10]);
                $newActive      =   $conn->real_escape_string($data[11]);
                $newRecovered   =   $conn->real_escape_string($data[12]);
                $newDeath       =   $conn->real_escape_string($data[13]);


             if($stateCode == 'BR'){
                $SheetUpload = $common->uploadData($conn,$slno,$districtCode,$districtName,$totalConfirmed,$totalActive, $totalRecovered,$totalDeath,$newCases,$newActive,$newRecovered,$newDeath);
                // Calculate the Sum of district data in separate variable.
                // After full traversal, call the db function for inserting the data in snap shot mode.
                // Also maintain one if block for PATNA data.

                
                $locationBihar         = 'b';
                $totalCaseBihar        =  $totalCaseBihar +  $totalConfirmed ;
                $newCaseBihar          =  $newCaseBihar   +  $newCases;
                $totalDeathBihar       =  $totalDeathBihar + $totalDeath;
                $newDeathBihar         =  $newDeathBihar + $newDeath;
                $totalRecoverBihar     =  $totalRecoverBihar + $totalRecovered;
                $activeCaseBihar       =  $activeCaseBihar + $totalActive;

                    if($districtName  == 'Patna'){
                        $locationPatna         = 'p';
                        $totalCasePatna        = $totalConfirmed;
                        $newCasePatna          = $newCases;
                        $totalDeathPatna       = $totalDeath;
                        $newDeathPatna         = $newDeath;
                        $totalRecoverPatna     = $totalRecovered;
                        $activeCasePatna       = $totalActive;                                  
                        // Insert Patna data in DB
                            $sqltotalCase      = "update corona_alldata set dataCount = '$totalCasePatna'      where dataKey = 'patnaTotalCase' ";
                            $sqlnewCase        = "update corona_alldata set dataCount = '$newCasePatna'        where dataKey = 'patnaNewCase' ";
                            $sqltotalDeath     = "update corona_alldata set dataCount = '$totalDeathPatna'     where dataKey = 'patnaTotalDeath' ";
                            $sqlnewDeath       = "update corona_alldata set dataCount = '$newDeathPatna'       where dataKey = 'patnaNewDeath' ";
                            $sqltotalRecover   = "update corona_alldata set dataCount = '$totalRecoverPatna'   where dataKey = 'patnaTotalRecovered' ";
                            $sqlActiveCase     = "update corona_alldata set dataCount = '$activeCasePatna'     where dataKey = 'patnaActiveCase' ";
                        
                            $resulttotalCase    = mysqli_query($conn , $sqltotalCase);
                            $resultnewCase      = mysqli_query($conn , $sqlnewCase);
                            $resulttotalDeath   = mysqli_query($conn , $sqltotalDeath);
                            $resultnewDeath     = mysqli_query($conn , $sqlnewDeath);
                            $resulttotalRecover = mysqli_query($conn , $sqltotalRecover);
                            $resultActiveCase   = mysqli_query($conn , $sqlActiveCase);
                        
                            echo "Data updation done for Patna Category";                                      
                        // Patna data in DB ENDS
                    }   
            }


            }

        }

        // Insert the Bihar data in DB
        $sqltotalCase      = "update corona_alldata set dataCount = '$totalCaseBihar'      where dataKey = 'biharTotalCase' ";
        $sqlnewCase        = "update corona_alldata set dataCount = '$newCaseBihar'        where dataKey = 'biharNewCase' ";
        $sqltotalDeath     = "update corona_alldata set dataCount = '$totalDeathBihar'     where dataKey = 'biharTotalDeath' ";
        $sqlnewDeath       = "update corona_alldata set dataCount = '$newDeathBihar'       where dataKey = 'biharNewDeath' ";
        $sqltotalRecover   = "update corona_alldata set dataCount = '$totalRecoverBihar'   where dataKey = 'biharTotalRecovered' ";
        $sqlActiveCase     = "update corona_alldata set dataCount = '$activeCaseBihar'     where dataKey = 'biharActiveCase' ";
    
        $resulttotalCase    = mysqli_query($conn , $sqltotalCase);
        $resultnewCase      = mysqli_query($conn , $sqlnewCase);
        $resulttotalDeath   = mysqli_query($conn , $sqltotalDeath);
        $resultnewDeath     = mysqli_query($conn , $sqlnewDeath);
        $resulttotalRecover = mysqli_query($conn , $sqltotalRecover);
        $resultActiveCase   = mysqli_query($conn , $sqlActiveCase);
        
        echo "Data updation done for Bihar Category";                                      
        // Bihar data in DB ENDS
 
 
 
 
        if ($SheetUpload){
            echo "<script>alert('Bihar Excel file has been uploaded successfully !'); window.location.href='biharDistrictForm.php';</script>";
        }
    }
}