<?php
//接前端送來的資料(按了哪個按鈕、第一張和第二張圖的編號)
$button = (int)$_POST['button'];
$prep1 = (int)$_POST['prep1'] ;
$prep2 = (int)$_POST['prep2'] ;
$id = $prep1 -1 ;
$id2 = $prep2 -1 ;
echo $id;
// db連線
$servername ="localhost";
$username = "root";
$passpword ="";
$dbname= "test";
$connection = mysqli_connect($servername, $username , $passpword, $dbname) or die("fail to connection");

mysqli_set_charset($connection,'utf8');

// 去資料庫撈剛剛兩張圖片的原始rate
$sql = "SELECT rate FROM test.tbl_name where id = $id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC ) ;
$sql1 = "SELECT rate FROM test.tbl_name where id = $id2";
$result1 = mysqli_query($connection, $sql1);
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC ) ;
$r1=(double)$row['rate'];
$r2=(double)$row1['rate'];
// 計算期望值
$e1 = 1/(1+ pow(10,($r2 - $r1)/400));
$e2 = 1/(1+ pow(10,($r1 - $r2)/400));
// 根據點選結果計算新的elo等級分
if ($button==1) {
    if($r1<=2100) 
        $nr1=$r1+32*(1-$e1);
    else if($r1<2400)
        $nr1=$r1+24*(1-$e1);
    else
        $nr1=$r1+16*(1-$e1);
    if($r2<=2100) 
        $nr2=$r2+32*(0-$e2);
    else if($r2<2400)
        $nr2=$r2+24*(0-$e2);
    else
        $nr2=$r2+16*(0-$e2);
}
else {
    if($r1<=2100) 
        $nr1=$r1+32*(0-$e1);
    else if($r1<2400)
        $nr1=$r1+24*(0-$e1);
    else
        $nr1=$r1+16*(0-$e1);
    if($r2<=2100) 
        $nr2=$r2+32*(1-$e2);
    else if($r2<2400)
        $nr2=$r2+24*(1-$e2);
    else
        $nr2=$r2+16*(1-$e2);
}

// 將新的elo等級分更新資料庫
$sql2 = "UPDATE test.tbl_name SET rate=$nr1 where id = $id";
$result2 = mysqli_query($connection, $sql2);

$sql3 = "UPDATE test.tbl_name SET rate=$nr2 where id = $id2";
$result3 = mysqli_query($connection, $sql3);




mysqli_close($connection);
?>