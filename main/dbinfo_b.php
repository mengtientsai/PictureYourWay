<?php
// db連線
 error_reporting(E_ALL | E_STRICT);
 ini_set('display_errors', 'On');
 $servername ="localhost";
 $username = "root";
 $password ="";
 $dbname= "test";
 
 
 //接前端送來的資料
 $picnum=(int)$_POST['pic'];
 $connection = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
}
mysqli_set_charset($connection,'utf8');

// 去資料庫撈選擇的景點的相關資訊
$sql = "SELECT * FROM test.info where pic= $picnum";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// 傳回前端
echo json_encode($row);
 
 
?>