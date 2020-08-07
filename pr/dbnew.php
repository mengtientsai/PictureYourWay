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
    //接前端送來的資料
    $selectarr = json_decode($_POST['mydata']);
    // 如果沒收到以此代替(當初做測試時使用)
    if(!isset($selectarr)){
        $selectarr = [3621,855,3752];
    }
    // 宣告使用的陣列與變數
    $selectlength=count($selectarr);
    $mainarray=array();
    $cluster=array();
    $distrecord=array();
    $ratearray=array();
    $newcluster=array(array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0));
    $iteration=0;
    $size= 0;
    // 將資料庫中的圖片美觀排名elo等級分rate放入陣列$ratearray
    $sqlrate="SELECT * FROM test.elo_rate";
    $resultrate= mysqli_query($connection, $sqlrate);
    $resultrate = $connection->query($sqlrate);

    $ratearrayIndex = 0;
    while($rowrate = mysqli_fetch_array($resultrate,MYSQLI_NUM)){
        $ratearray[$ratearrayIndex]=$rowrate;
        $ratearrayIndex = $ratearrayIndex + 1; 
    }
    
    // 將資料庫中的各景點主題機率分佈topic放入陣列$mainarray
    // 也將圖片編號pic與其對應$ratearray放入$distrecord
    $judgeline=[];
    for($j=0;$j<$selectlength;$j++){
        array_push($judgeline,$size);
        $sqlselect="SELECT otopic FROM test.topic where pic= $selectarr[$j]";
        $resultselect= mysqli_query($connection, $sqlselect);
        $rowselect = mysqli_fetch_array($resultselect,MYSQLI_ASSOC);
        $sqltopic="SELECT * FROM test.topic where otopic=".$rowselect["otopic"];
        $resulttopic= mysqli_query($connection, $sqltopic);
        while($row = mysqli_fetch_array($resulttopic,MYSQLI_NUM)){ 
            $pic=$row[0];
            $distrecord[$size][0]=$pic;
            $distrecord[$size][1]=$ratearray[$pic-2][1];
            $mainarray[$size] = $row;
            $size = $size+1 ;
        }
    }
    
    // 設定根據使用者選幾個群分別在各群隨機取數個質心，並將質心編號放入$rnarray
    if($selectlength==1){
        $rnarray=UniqueRandomNumbersWithinRange(0,$size,9);
    }
    elseif($selectlength==2){
        $rnarray=UniqueRandomNumbersWithinRange(0,$judgeline[1],4);
        $temp=UniqueRandomNumbersWithinRange($judgeline[1],$size,5);
        $rnarray=array_merge($rnarray,$temp);
    }
    else{
        $rnarray=UniqueRandomNumbersWithinRange(0,$judgeline[1],3);
        $rnarray=array_merge($rnarray,UniqueRandomNumbersWithinRange($judgeline[1],$judgeline[2],3));
        $rnarray=array_merge($rnarray,UniqueRandomNumbersWithinRange($judgeline[2],$size,3));  
    }

    // 開始計算K-MEANS

    // 根據所選的質心把$mainarray內的資訊放入$cluster
    for($j=0;$j<9;$j++){
        $cluster[$j]=$mainarray[$rnarray[$j]];
    }

    // 計算各景點與各$cluster的歐式距離並放入$distcluster找最小值為新群，並將各景點所屬的新群放入$mainarray各列的最後一行
    $distcluster=[];
    for($j=0;$j<$size;$j++){
        for($clustopic=0;$clustopic<9;$clustopic++){
            $distsum=0;
            for($i=1;$i<10;$i++){
                $distsum=$distsum+pow(($mainarray[$j][$i]-$cluster[$clustopic][$i]),2);
            }
            $distcluster[$clustopic]=sqrt($distsum);
        }
        $mindist=min($distcluster);
        $nearcluster=array_search($mindist,$distcluster);
        $distrecord[$j][2]=$mindist;
        array_push($mainarray[$j],$nearcluster);

        $newcluster[$nearcluster][0]=$newcluster[$nearcluster][0]+1;
        for($k=1;$k<10;$k++){
            $newcluster[$nearcluster][$k] = $mainarray[$j][$k] + $newcluster[$nearcluster][$k];
        }
    }
    // 計算新群中的新質心放入$newcluster
    for($i=0;$i<9;$i++){
        $count=$newcluster[$i][0];
        for($j=1;$j<10;$j++){
            $newcluster[$i][$j]=$newcluster[$i][$j]/$count;
        }
    }
    //重複上述步驟連續迭代，迭代門檻為200
    while($iteration<200){
        $judge=0;
        $mainlength=count($mainarray[0]);
        // 判斷各景點的所屬的新群是否與舊群相同，若有不同則$judge=1並跳出迴圈
        for($j=0;$j<$size;$j++){
            if($mainarray[$j][$mainlength-1]!=$mainarray[$j][$mainlength-2]){
                $judge=1;
                break;
            }
        }   
        // $judge==0為停止條件，確定質心跳出while迴圈
        if($judge==0){
            break;
        }
        // $judge==1則繼續計算新質心進入下一回迭代
        else{
            $cluster=$newcluster;
            $distcluster=[];
            $newcluster=array(array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0));
            for($j=0;$j<$size;$j++){
                for($clustopic=0;$clustopic<9;$clustopic++){
                    $distsum=0;
                    for($i=1;$i<10;$i++){
                        $distsum=$distsum+pow(($mainarray[$j][$i]-$cluster[$clustopic][$i]),2);
                    }
                    $distcluster[$clustopic]=sqrt($distsum);
                }
                $mindist=min($distcluster);
                $nearcluster=array_search($mindist,$distcluster);
                $distrecord[$j][2]=$mindist;
                array_push($mainarray[$j],$nearcluster);

                $newcluster[$nearcluster][0]=$newcluster[$nearcluster][0]+1;
                for($k=1;$k<10;$k++){
                    $newcluster[$nearcluster][$k] = $mainarray[$j][$k] + $newcluster[$nearcluster][$k];
                }
            }
            for($i=0;$i<9;$i++){
                $count=$newcluster[$i][0];
                for($j=1;$j<10;$j++){
                    $newcluster[$i][$j]=$newcluster[$i][$j]/$count;
                }
            } 
        }
        $iteration=$iteration+1;
    }

    // 將剩下的各景點最後的比重($distrecord[$j][1]/$distrecord[$j][2]=elo等級分/距離質心之歐式距離)存入$distrecord第3行
    // 將剩下的各景點最後的質心存入$distrecord第4行
    $mainlength=count($mainarray[0]);
    for($j=0;$j<$size;$j++){
        $distrecord[$j][3]=$distrecord[$j][1]/$distrecord[$j][2];
        $distrecord[$j][4]=$mainarray[$j][$mainlength-1];
    }
    // 根據$distrecord第3行由大排到小
    usort($distrecord, function($a, $b) {
        return $b[3] <=> $a[3];
    });

    // 從最大開始檢視，遇到的每群第一個則為該群的新代表圖並存入$newshow
    $newshow=[0,0,0,0,0,0,0,0,0]; 
    for($j=0;$j<$size;$j++){
        $finalcluster=$distrecord[$j][4];
        if($newshow[$finalcluster]==0)
            $newshow[$finalcluster]=$distrecord[$j][0];
        elseif(in_array(0, $newshow)==FALSE)
            break;
    }

    // 將各新群代表圖編號$newshow存入$result第1行
    // 將剩下的各景點之圖片編號、elo等級分、所屬之新群存入$result
    $result['show'] = $newshow ;
    $resultIndex = 0;
    foreach($distrecord as $row){
        $result['pic'][$resultIndex] = $row[0] ;
        $result['rate'][$resultIndex] = $row[1];
        $result['newcluster'][$resultIndex] = $row[4];
        $resultIndex =$resultIndex + 1 ;
    }
    // 將$result整個陣列傳去前端
    echo json_encode($result);
    

    // 區間取隨機的方法
    function UniqueRandomNumbersWithinRange($min,$max,$quantity) {
        $numbers = range($min, $max-1);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
    // mysqli_close($connection);


?>