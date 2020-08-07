<?php
// db連線
 error_reporting(E_ALL | E_STRICT);
 ini_set('display_errors', 'On');
 $servername ="localhost";
 $username = "root";
 $password ="";
 $dbname= "test";
 $connection = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
 } 
 mysqli_set_charset($connection,'utf8');

 //接前端送來的資料
 $picarr =json_decode('[' . $_POST['pic'] . ']', true);
 //生成sql指令  
 $statement= "";
 for($i=0; $i<count($picarr);$i++){
    if($i==0){
        $statement = $statement."pic=".$picarr[$i]; 
    }else{
        $statement = $statement." OR pic=".$picarr[$i]; 
    }
 }
// 去資料庫撈剩下的每個景點的名稱、簡述，並按rate由高排到低 
 $dbsql="SELECT * FROM test.info where ".$statement." order by rate DESC";
 $dbresult= mysqli_query($connection, $dbsql);
 $mainarray=array();
 $index = 0;
 while($dbrow = mysqli_fetch_array($dbresult,MYSQLI_NUM)){
     $mainarray[$index]=$dbrow;
     $index = $index + 1; 
 }
//  將撈到的資訊全部按順序存入$result
 $resultIndex = 0;
 foreach($mainarray as $row){
     $result['pic'][$resultIndex] = $row[0];
     $result['name'][$resultIndex] = $row[1];
     $result['toldscribe'][$resultIndex] = $row[2];
     $resultIndex =$resultIndex + 1 ;
 }
// 將$result整個陣列傳去前端
echo json_encode($result);
?>