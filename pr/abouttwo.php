<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Research Concept</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<style>
body {
    font-family: "Times New Roman", Microsoft JhengHei;
    margin: 0;
    background: rgb(60, 60, 60);
    color: white;
    font-size: 20px;
}
h1{
    font-family: "Times New Roman", Microsoft JhengHei;
    letter-spacing: 2px;
    color: white;
    font-size: 25px;
    font-weight: bold;
    margin: 5px 0;
}
.padding{
  padding: 7px 16px!important;
}
.w3-bar .w3-bar-item {
  padding: 2px 16px!important;
}
.oi{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  border: 2px solid #000;
  border-color: rgba(0,0,0,0.4);
}
.span{
    padding: 5px;
    border: 2px solid #000;
    border-color: rgba(0,0,0,0.4);
    float: left;
}


table, th, td {
    border: 5px solid rgb(60, 60, 60);
    text-align: center;
    border-collapse: collapse;  

}
.show{
    margin-top: 0px;
    padding-right: 140px;
    padding-left: 0px;
    padding-bottom:20px;
}
.showup{
    margin-top: 30px;
    padding-right: 70px;
    padding-left:70px;
    padding-bottom:20px;
}
.button {
    background-color: style="background-color:rgba(255, 99, 71, 0);";
    color: white;
    padding: 20px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: "Playfair Display", sans-serif;
    font-style: italic;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}
.words{
	font-size:24px;
	color: white;
	position: absolute;
	letter-spacing: 10px;
	align:top;
	z-index:1;
}
/* Create three unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
}
/* Left and right column */
.column.side {
    width: 15%;
}
/* Middle column */
.column.middle {
    width: 86%;
    float: middle;
    margin-left: 85px;
}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column.side, .column.middle {
        width: 100%;
    }
}
tbody > tr > td {
    position: relative;
}

.next-button{
    background: #000;

}
.next-button:hover{
    background: #fff;
}
.w3-large{
    color: white;
}

.content{
    vertical-align:top;
    color:rgba(255,255,255,0.9);
    font-size:24px;
    padding-left:55px;
    text-align:left;
    display:inline-block;
    max-width:59%;
}
.title{
    font-size: 48px;
    font-weight: bold;
    padding: 64px 0 48px 0;
}

.result{
    display:block;
    width:100%;
    padding-bottom:50px;
}
.show_block{
    display: inline-block;
    vertical-align: top;
    max-width: 40%;

}
.img{
    width:24px;
    height:24px;
    margin-right:6px;
    vertical-align: baseline;
}
.scroll_block {
    font-family:  Microsoft JhengHei;
    padding: 10px 80px 0 38px;
    line-height: 48px;
    height: auto;
    overflow-y: hidden;
}
.scroll_block::-webkit-scrollbar {
    width: 0.4em;
}
.scroll_block::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
.scroll_block::-webkit-scrollbar-thumb {
  background-color:  rgba(255,255,255,0.3);
  outline: 1px solid slategrey;
}

.toldscribe {
    padding-top: 25px;
}

.line>div {
    max-width: 86%;
    color:rgba(255,255,255,.9);
    font-size:22px;
}

.line >img, .line>div {
    display: inline-block;
}
.line>img {
    position: absolute;
    top: 11px;
    left: -37px;
}

.line {
    position: relative;
    padding-bottom:15px
}

.project >div > span {
    font-size: 21px;
    font-weight: bold;
    letter-spacing:2px;
}
.project>div {
    max-width: 100%;
    color: rgba(255,255,255,.9);
    font-size: 20px;
    line-height:46px;

}
.project > span{
    font-size:25px;
    font-weight:bold;
}

</style>
<script type="text/javascript">

</script>
</head>

<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar padding w3-card" style="letter-spacing:4px;background-color:DimGray;">
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="index.php" class="w3-bar-item w3-button">Homepage</a>
    </div>
  </div>
</div>
<div class="w3-row title">

       <h1 class="w3-center chinese">《研究理念》</h1>
       <h1 class="w3-center">Research Concept</h1>
       
</div>

<!-- Page content -->

    
<div class="result">
<div class="result">
    <div class="content">
        <div class="scroll_block">
            <div class="project line"><span>• 本系統特點</span></div>
            <div class="project line"><div><span>(一) 減少使用者搜索時間<br></span>不需要閱讀冗長的景點敘述，只需使用本研究的網頁系統，就能簡單且快速的提供使用者所感興趣的景點。</div></div>
            <div class="project line"><div><span>(二) 高隱私，低操作<br></span>透過各種演算的結合與正確的使用，得以讓使用者不需提供任何私人訊息，只需動動手指即可得到推薦結果。</div></div>
            <div class="project line"><div><span> (三) 推薦才貌兼併的全能型圖片<br></span>Jieba斷詞與LDA主題分布可以挑選出有內涵的圖片，而Elo Rating System則是挑出美麗的圖片，將兩者結合後才貌兼備的圖片就此產生。</div></div>
        </div>
    </div>
    <div class="show_block">
        <img id="show1" src="src/logo.jpg" class="w3-round w3-image showup">
    </div>
</div>
    <div class="content">
        <div class="scroll_block">
            <div class="project line"><span>• 研究流程</span></div>
            <div class="project line"><div><span>Step1:</span>從Instagram中地毯式蒐圖，同時對政府開放平台的資料集中的景點簡述進行Jieba斷詞。</div></div>
            <div class="project line"><div><span>Step2:</span>運用Scatter/Gather的概念，融合LDA主題模型與K-Means分群，「快速」的挑出「準確」的結果。</div></div>
            <div class="project line"><div><span>Step3:</span>透過Elo Rating System排序圖片美觀程度，優化景點挑選之結果。</div></div>
            <div class="project line"><div><span>Step4:</span>設計實驗蒐集問卷，將結果進行Spearman相關分析，驗證研究方法的可行性以及研究結果的可信度。</div></div>
        </div>
    </div>
    <div class="show_block">
        <img id="show1" src="src/abouttwo1.jpg" class="w3-round w3-image show">
    </div>
</div>
<div class="content">
        <div class="scroll_block">
            <div class="project line"><span>• 資料來源</span></div>
            <div class="project line"><div><span>I.主要資料集:</span> 景點-觀光資訊資料庫<br> <a href="https://data.gov.tw/dataset/7777" target="_blank">&nbsp;https://data.gov.tw/dataset/7777</a></div></div>
            <div class="project line"><div><span>II.K-means測試資料集:</span> 台南景點<br> <a href="https://data.gov.tw/dataset/6183" target="_blank">&nbsp;https://data.gov.tw/dataset/6183</a></div></div>
        </div>
    </div>
<!-- End page content -->


  
</body>
</html>