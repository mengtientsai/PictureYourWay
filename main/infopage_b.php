<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Start to pick a picture</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<style>
body {
      font-family: Microsoft JhengHei;
	  margin: 0;
	  background: rgb(60, 60, 60);
}
h1,h2,h3,h4,h5,h6{
    font-family: "Comic Sans MS";
    letter-spacing: 1px;
    color: white;
    font-size:20px;
}
table, th, td {
    border: 5px solid rgb(60, 60, 60);
    text-align: center;
    border-collapse: collapse;  

}
.show{
    margin-top: 110px;
    padding-right: 65px;
    padding-left: 110px;
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
    vertical-align:middle;
    color:rgba(255,255,255,0.9);
    font-size:24px;
    padding-left:20px;
    text-align:left;
    display:inline-block;
    max-width:45%;
}
.title{
    font-size: 48px;
    font-weight: bold;
    padding: 41px 0 10px 0;
}

.result{
    display:block;
    width:100%;
    margin-top:30px;
}
.show_block{
    display: inline-block;
    vertical-align: middle;
    max-width: 50%;
x
}
.img{
    width:20px;
    height:20px;
    margin-right:6px;
    vertical-align: baseline;
}
.scroll_block {
    margin-top: 35px;
    padding: 0px 10px 0 1px;
    line-height: 40px;
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

</style>
<script type="text/javascript">



$(document).ready(function(){

    var finaldata = JSON.parse(localStorage.getItem("final"))
    
    $(".result").append('<div class="show_block"><img id="show1" src="/src/pic'+finaldata.pic+'.jpg" class="w3-round w3-image w3-opacity-min show"  /></div><div class="content"><div class="title">'+finaldata.name+'</div><div class="scroll_block"><div class="name"><img class="img" src="/src/pin.png">'+finaldata.add+'</div><div class="tel"><img class="img" src="/src/telephone.png">'+finaldata.tel+'</div>')
    if(finaldata.opentime !=="無" && finaldata.opentime !=="NULL" && finaldata.opentime !=="未提供" && finaldata.opentime !==""  && finaldata.opentime !=="-"  && finaldata.opentime !=="N/A" && finaldata.opentime !=="否"){
        $(".scroll_block").append('<div class="opentime"><img class="img" src="/src/clock.png">'+finaldata.opentime+'</div>')
    }
    if(finaldata.website!=""){
        $(".scroll_block").append('<div class="website"><img class="img" src="/src/earth.png"><a href="'+finaldata.website+'">'+finaldata.website+'</a></div>')
    }
    if(typeof finaldata.toldscribe !== "undefined" && finaldata.toldscribe !== "")  $(".scroll_block").append('<div class="toldscribe">'+finaldata.toldscribe+'</div>')
    $(".result").append('</div></div>')
});


/* 
    $.ajax({
        url:'index.php',
        data:{
            button:1,
            prep1:now1,
            prep2:now2

        },
        type:"POST",
        dataType:'text',
        //success:function(data){
        //   alert(data)
        //}
    }) */
	


</script>
</head>

<body>
<!-- Navbar (sit on top) -->
<div class="w3-bottom" style="z-index:999">
  <div class="w3-bar w3-black w3-padding w3-card" style="letter-spacing:4px;color: #f1f1f1;font-family:Microsoft JhengHei, Verdana, Arial, Helvetica, sans-serif;">
    <a href="index_b.php" class="w3-bar-item w3-button ">回首頁</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small ">
     <a href="finalpage_b.php" class="w3-bar-item w3-button ">上一頁</a>
    </div>
  </div>
</div>

<div class="result"></div>
</body>
</html>