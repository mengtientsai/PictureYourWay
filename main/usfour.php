<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>About us 關於我們</title>
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
    padding-right: 15px;
    padding-left: 100px;
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
    max-width:49%;
}
.title{
    font-size: 48px;
    font-weight: bold;
    padding: 64px 0 48px 0;
}

.result{
    display:block;
    width:100%;
}
.show_block{
    display: inline-block;
    vertical-align: top;
    max-width: 50%;

}
.img{
    width:24px;
    height:24px;
    margin-right:6px;
    vertical-align: baseline;
}
.scroll_block {
    font-family: "Comic Sans MS", Microsoft JhengHei;
    padding: 10px 10px 0 38px;
    line-height: 48px;
    height: 436px;
    overflow: auto;
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
}

.project >div > span {
    font-size: 26px;
    vertical-align: middle;
    font-weight: bold;
    letter-spacing:8px;
}
.project>div {
    max-width: 100%;
    color: rgba(255,255,255,.9);
    font-size: 15px;
    line-height:29px;

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
    <a href="index_b.php" class="w3-bar-item w3-button">Homepage</a>
    </div>
  </div>
</div>
<div class="w3-row title">

       <h1 class="w3-center chinese">《關於我們》</h1>
       <h1 class="w3-center">About Us</h1>
       
</div>

<!-- Page content -->

    
<div class="result">
    <div class="show_block">
        <img id="show1" src="src/S__4587527.jpg" class="w3-round w3-image w3-opacity-min show">
    </div>
    <div class="content">
        <div class="scroll_block">
            <div class="project line"><img class="img" src="/src/project.png"><div><span>圖窮景獻</span><br> Scatter/Gather 結合 LDA 與 K-Means 建構圖片景點推薦系統</div></div>
            <div class="contact line"><img class="img" src="/src/contact.png"><div>PictureYourWay@gmail.com</div></div>
            <div class="school line"><img class="img" src="/src/school.png"><div>輔仁大學&nbsp;統計資訊學系</div></div>
            <div class="teacher line"><img class="img" src="/src/teacher.png"><div>杜逸寧&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;教授</div></div>
            <div class="team line"><img class="img" src="/src/team.png">
                <div>蔡孟恬&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;張家語<br>杜孟澐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蘇奕華<br>王鈺婷&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;施建宏</div>
            </div>

        </div>
    </div>
</div>
 
<!-- End page content -->


  
</body>
</html>