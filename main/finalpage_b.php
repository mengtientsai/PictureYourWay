<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8"></meta>
<title>Result</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<style>
body {
      font-family: Microsoft JhengHei;
	  margin: 0;
	  background: rgb(60, 60, 60);
      width:100%;
}
h1,h2,h3,h4,h5,h6{
    font-family: "Comic Sans MS";
    letter-spacing: 1px;
    color: white;
    font-size:20px;
}
table, th, td {
    position:relative;
    border: 65px solid rgb(60, 60, 60);
    color: white;
    font-size:18px;
    text-align: left;
    letter-spacing: 5px;
    border-collapse: collapse;  
    height:auto;
    background-color:#fff;
    padding:0;
    border-radius:2px;
   	/*自動斷行*/
   	word-wrap: break-word;
   	table-layout: fixed;
    text-align: center;
    padding-bottom:10px;
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
    display:block;
	font-size:20px;
    font-weight:bold;
	color: #000;
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
    width: 10%;
}
/* Middle column */
.column.middle {
    width: 100%;
    padding: 40px 46px 0 46px;
    float: middle;
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
.block{
    width:250px;
}
img.show:hover{
    opacity:0.5;
    /* transform: scale(1.5); */
    -webkit-transition: all 0.25s ease;

}
tbody > tr > td {
    position: relative;
}

.opacity_02{
    opacity:0.2 !important;
}
.finalbutton{
    color: black;
    padding: 10px 15px;
    /* text-align: center; */
    text-decoration: none;
    font-family: Microsoft JhengHei;
    font-size: 20px;
    margin: 40px 50px;
    border-radius: 2px;
    border: 2px solid #f7f7f7;
    background-color: #fff;
}
.framk{
    background-color:#fff;
}
.description{
    position:fixed;
    width:100px;
    height:100px;
    background:red;
    left:10px;
    top:100px; 
}
.lds-default {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
  left: 47%;
}
.lds-default div {
  position: absolute;
  width: 5px;
  height: 5px;
  background: #fff;
  border-radius: 50%;
  animation: lds-default 1.2s linear infinite;
}
.lds-default div:nth-child(1) {
  animation-delay: 0s;
  top: 29px;
  left: 53px;
}
.lds-default div:nth-child(2) {
  animation-delay: -0.1s;
  top: 18px;
  left: 50px;
}
.lds-default div:nth-child(3) {
  animation-delay: -0.2s;
  top: 9px;
  left: 41px;
}
.lds-default div:nth-child(4) {
  animation-delay: -0.3s;
  top: 6px;
  left: 29px;
}
.lds-default div:nth-child(5) {
  animation-delay: -0.4s;
  top: 9px;
  left: 18px;
}
.lds-default div:nth-child(6) {
  animation-delay: -0.5s;
  top: 18px;
  left: 9px;
}
.lds-default div:nth-child(7) {
  animation-delay: -0.6s;
  top: 29px;
  left: 6px;
}
.lds-default div:nth-child(8) {
  animation-delay: -0.7s;
  top: 41px;
  left: 9px;
}
.lds-default div:nth-child(9) {
  animation-delay: -0.8s;
  top: 50px;
  left: 18px;
}
.lds-default div:nth-child(10) {
  animation-delay: -0.9s;
  top: 53px;
  left: 29px;
}
.lds-default div:nth-child(11) {
  animation-delay: -1s;
  top: 50px;
  left: 41px;
}
.lds-default div:nth-child(12) {
  animation-delay: -1.1s;
  top: 41px;
  left: 50px;
}
@keyframes lds-default {
  0%, 20%, 80%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
}
.w3-image{
    max-width:80%;
}
.loadmore{
    padding: 10px 45px;
    text-align: center;
    background-color: rgb(255,255, 255);
    color: rgba(0,0,0,0.8);
    transition: all 100ms ease-in-out;
    -webkit-transition: all 200ms ease-in-out;
    -moz-transition: all 100ms ease-in-out;
    -o-transition: all 100ms ease-in-out;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 22px;
    width: 439px;
    border-radius: 2px;
}
.loadmore:hover {
    background-color: #000;
    color: rgba(255, 255, 255,0.8);
}
.load{
    padding-top:20px;
    padding-bottom:120px;
    width: 100%;
    text-align: center;

}
</style>
<script>
var picnum;
var returnpic;
function showclick(){
    $(".show").on("click",function(){

        var imgshow= $(this)

        picnum =parseInt($(this).attr('src').substring($(this).attr('src').indexOf("pic")+3,$(this).attr('src').indexOf(".jpg")));
        $.ajax({
            type:'POST',
            url: 'dbinfo_b.php',
            data:{ 'pic' : picnum},
            dataType:'json',
            success: function(response) {
                localStorage.setItem("final", JSON.stringify(response))
                window.location.href = "infopage_b.php"
            }
        })

    });


}
$(document).ready(function(){
    $.ajax({
        type:'POST',
        url: 'dbfinal_b.php',
        data:{'pic': localStorage.getItem("pic")},
        dataType:'json',
        success: function(response) {
            console.log(response['pic'])
            console.log(response['name'])
            console.log(response['toldscribe'])
            localStorage.setItem("name", response['name']);
            localStorage.setItem("dbfinalpic", response['pic']);


            var k=1;
            for(i=0; i<9; i=i+3){
                $(".content").find("table").append('<tr>')
                for(j=0;j<3;j++){
                    console.log(response['pic'][i+j])
                    if(typeof response['name'][i+j]!="undefined"){
                        $(".content tr:nth-child("+k+")").append('<td ><a class="words">'+response['name'][i+j]+'</a><img src="/src/pic'+response['pic'][i+j]+'.jpg" class="w3-round w3-image show"  /><div class="checkmark"></div></td>')
                    }else{
                        $(".content tr:nth-child("+k+")").append('<td style="background:rgb(60,60,60)"></td>')
                    }
                }
                $(".content").find("table").append('</tr>')
                k = k+1;
            }   
            document.getElementsByClassName("lds-default")[0].style.display="none";         
            // val() arr[0]
           showclick();

            
        }
    });
    $(".loadmore").on("click",function(){
        var k=$(".content tr").length+1;
        var current_size = $("table tbody tr td").has("a").length;
        for(i=current_size; i<current_size+9; i=i+3){
            $(".content").find("table").append('<tr>')
            for(j=0;j<3;j++){
                console.log(localStorage.getItem("name").split(",")[i+j])
                if(localStorage.getItem("name").split(",")[i+j]){
                    $(".content tr:nth-child("+k+")").append('<td ><a class="words">'+localStorage.getItem("name").split(",")[i+j]+'</a><img src="/src/pic'+localStorage.getItem("dbfinalpic").split(",")[i+j]+'.jpg" class="w3-round w3-image show"  /><div class="checkmark"></div></td>')
                }else{
                    console.log("fixfix")
                    $(".content tr:nth-child("+k+")").append('<td style="background:rgb(60,60,60)"></td>')
                }
            }
            $("content").find("table").append('</tr>')
            k = k+1;
        }   
        if(current_size+9>localStorage.getItem("dbfinalpic").split(",").length) $(".loadmore").hide()
        document.getElementsByClassName("lds-default")[0].style.display="none";    
    
        showclick();
    })
    

 
})

</script>
</head>

<body>
<div class="w3-bottom" style="z-index:999">
    <div class="w3-bar w3-black w3-padding w3-card" style="letter-spacing:4px;color: #f1f1f1;font-family: Microsoft JhengHei, Verdana, Arial, Helvetica, sans-serif;">
    <a href="index_b.php" class="w3-bar-item w3-button">回首頁</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small ">
    <a  class="w3-bar-item" ></a>
    </div>
  </div>
</div>

<!-- Table -->
<div class="w3-container w3-padding-64">
    <h2 style="text-align: center" ><b>測驗結束</b></h2>
    <div>
    </div>
    <div>
    <h2 style="text-align: center" ><b>以下是推薦給您的景點</b></h2>
    </div>
    <div>
    <h2 style="text-align: center"><b style="color: yellow">*點選圖片附有景點相關資訊</b></h2>
    </div>
    <form action="/action_page.php" target="_blank">
   
    <div class="row">
	<div class="column middle content">
    <table>
		</table>
	</div>
	</div>
      
    </form>
    <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    <!-- <div style="text-align:center;">
    <td><button class="finalbutton none">都不想去</button></td>
    <td><button class="finalbutton record">確認送出</button></td> 
    </div>  -->
  </div> 
  <div class="load">
    <a  class="loadmore"> Load More</a>
  </div>
</body>
</html>