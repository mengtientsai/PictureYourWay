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



    //接前端送來的資料(包含選擇的圖片和上一輪全部的圖片及其rate、所屬的群)
    $selectarr = json_decode($_POST['mydata']);
    $picarr =json_decode('[' . $_POST['pic'] . ']', true);
    $ratearr = json_decode('[' . $_POST['rate']. ']', true);
    $oclusterarr = json_decode('[' .$_POST['newcluster']. ']', true);
    
    //將接收到的陣列整合成一個二維陣列$receive
    // $viewresult是一個判斷變數，若$viewresult==1的時候代表群已足夠小到進入結果畫面，反之則繼續進入newpicturepersonal_b.php
    $viewresult=0;
    $receive=array();
    $receivelength=count($picarr);
    for ($i=0;$i<$receivelength;$i++){
        $receive[$i][0]=$picarr[$i];
        $receive[$i][1]=$ratearr[$i];
        $receive[$i][2]=$oclusterarr[$i];
    }
    // 去資料庫撈剩下的每個景點的各主題機率分佈
    $dbarray=array();
    $dbsql="SELECT * FROM test.topic";
    $dbresult= mysqli_query($connection, $dbsql);
    $index = 0;
    while($dbrow = mysqli_fetch_array($dbresult,MYSQLI_NUM)){
        $dbarray[$index]=$dbrow;
        $index = $index + 1; 
    }
    // 宣告使用的陣列與變數
    $selectlength=count($selectarr);
    $mainarray=array();
    $distrecord=array();
    $size= 0;
    $judgeline=[];
    $cluster=array();
    // 將所有資料整合生成與dbnew_b裡面的$mainarray一樣形式的二維陣列
    for($i=0;$i<$selectlength;$i++){
        $receiveid=searchForId($selectarr[$i], $receive);
        $topic=$receive[$receiveid][2];
        array_push($judgeline,$size);
        for($j=0;$j<$receivelength;$j++){
            if($receive[$j][2]==$topic){
                $pic=$receive[$j][0];
                $distrecord[$size][0]=$pic;
                $distrecord[$size][1]=$receive[$j][1];
                $dbid=searchForId("$pic", $dbarray);
                $mainarray[$size]=$dbarray[$dbid];
                $mainarray[$size][10]=$receive[$j][2];
                $size=$size+1;
            }
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

    // 若有些使用者勾選的群所剩的景點數量小於要從中隨機取的群心數，則從全部景點內再隨機挑與已挑的不重複的作為初始群心
    while(count($rnarray)<9){
        $n=rand(0,$size-1);
        if(in_array($n,$rnarray)==FALSE)
        array_push($rnarray,$n);
    }

    // 開始計算K-MEANS

    // 根據所選的質心把$mainarray內的資訊放入$cluster
    for($j=0;$j<9;$j++){
        $cluster[$j]=$mainarray[$rnarray[$j]];
    }
    
    $newcluster=array(array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0));
    $distcluster=[];
    
    // 計算各景點與各$cluster的歐式距離並放入$distcluster找最小值為新群，並將各景點所屬的新群放入$mainarray各列的最後一行
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
        // 停止條件:當一個新分的群裡只有0或1個景點則因為群太小沒有差異就把結果存入$result傳去前端而跳入最後結果畫面
        if ($count==0||$count==1){
            $viewresult=1;
            $result['viewresult'] = $viewresult ;
            $resultIndex = 0;
            foreach($distrecord as $row){
                $result['pic'][$resultIndex] = $row[0] ;
                $resultIndex =$resultIndex + 1 ;
            }
            echo json_encode($result);
            exit;
        }
        // 無停止則繼續計算
        else{
            for($j=1;$j<10;$j++){
                $newcluster[$i][$j]=$newcluster[$i][$j]/$count;
            }
        }
    }
    //重複上述步驟連續迭代，迭代門檻為200   
    $iteration=0;
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
                // 停止條件:當一個新分的群裡只有0或1個景點則因為群太小沒有差異就把結果存入$result傳去前端而跳入最後結果畫面
                if ($count==0||$count==1){
                    $viewresult=1;
                    $result['viewresult'] = $viewresult ;
                    $resultIndex = 0;
                    foreach($distrecord as $row){
                        $result['pic'][$resultIndex] = $row[0] ;
                        $resultIndex =$resultIndex + 1 ;
                    }
                    echo json_encode($result);
                    exit;
                }
                // 無停止則繼續計算
                else{
                    for($j=1;$j<10;$j++){
                        $newcluster[$i][$j]=$newcluster[$i][$j]/$count;
                    }
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
    
    // 若程式碼跑到此，表示景點都沒有少到遇到停止條件，那麼$viewresult就繼續保持0，進入newpicturepersonal_b.php
    // 將各新群代表圖編號$newshow存入$result第1行
    // 將剩下的各景點之圖片編號、elo等級分、所屬之新群存入$result
    $result['viewresult'] = $viewresult ;    
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
    
    // 找出某數字或字串位於一個陣列裡第幾位的方法
    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val[0] === $id) {
                return $key;
            }
        }
        return null;
    }
    
    // 區間取隨機的方法
     function UniqueRandomNumbersWithinRange($min,$max,$quantity) {
        $numbers = range($min, $max-1);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
    // mysqli_close($connection);


?>