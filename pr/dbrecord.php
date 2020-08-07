<?php
 // db連線
 error_reporting(E_ALL | E_STRICT);
 ini_set('display_errors', 'On');
 $servername ="localhost";
 $username = "root";
 $password ="";
 $dbname= "test";
 $connection = mysqli_connect($servername, $username , $password, $dbname) or die("fail to connection");
 mysqli_set_charset($connection,'utf8');
 $connection = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
 }

 // get data from finalpicturepersonal.php  
 if(!isset($_POST['selectedpic'])){
    $selectedpic = 0;
 }else{
    $selectedpic =  $_POST['selectedpic'];
 }
 if(!isset($_POST['pic'])){
     $pic=[908,3947,2347,2651,864,2990,3511,530,2884,2923,2027,1791,434,3028,237,2543,1120,798,503,3892,3214];
 }else{
     $pic =json_decode( $_POST['pic'] , true) ;
 }


 $pic_remove_select =[];
 foreach($pic as $value){
     if($value!=$selectedpic){
        array_push($pic_remove_select , $value);     
     }
 }

 //create update sql string 
 $set_selected_result= "update test.result set result =concat(result,'A')  where pic = $selectedpic";
 $set_other_results = "update test.result set result = concat(result,'B') where ";
 $set_unselected_result = "update test.result set result = concat(result,'C') where ";

 for($i=0; $i<count($pic_remove_select);$i++){
    if($i==0){
        $set_other_results = $set_other_results."pic=".$pic_remove_select[$i]; 
    }else{
        $set_other_results = $set_other_results." OR pic=".$pic_remove_select[$i]; 
    }
 }
 for($i=0; $i<count($pic);$i++){
    if($i==0){
        $set_unselected_result = $set_unselected_result."pic<>".$pic[$i]; 
    }else{
        $set_unselected_result = $set_unselected_result." AND pic<>".$pic[$i]; 
    }
 }
// record result 
if (mysqli_query($connection,$set_selected_result) === TRUE) 
    
if (mysqli_query($connection,$set_other_results ) === TRUE) 
    
if (mysqli_query($connection,$set_unselected_result ) === TRUE) 
    

echo "123";
 
 
?>