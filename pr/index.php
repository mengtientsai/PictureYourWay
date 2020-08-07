<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Homepage</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" ></meta>
<meta content="all" name="minwt" ></meta>
<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
<style>
@media screen and (max-width: 600px) {
    .column.side, .column.middle {
        width: 100%;
    }
}
h1{
    font-family: "Comic Sans MS", cursive, sans-serif;
    letter-spacing: 3px;
    color: white;
 }
p1{
    color: white;
 }
* {
    box-sizing: border-box;
}
body {
 overflow:hidden;
 margin: 0;
 font-family: Arial;
    font-size: 17px;
    padding:0;
        }
div {
 height: 100vh;
 background-size: cover;
        }
imgtitle{
 position: absolute;
 top:100px;
}
a:link, a:visited {
    color: white;
    padding: 20px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

.coverflow{
 width: 100%;
 height: auto;
 position: relative;
  }
.coverflow>a{
 display: block;
 width:100%;
 height:auto;
 position: absolute;
 top:0;
 left:0;
 opacity: 0;
     filter: alpha(opacity=0);
     /*當圖片數量增加，影片長度需更改，變為5s*圖片數量*/
     -webkit-animation: silder 30s linear infinite;
     animation: silder 30s linear infinite;
  }
.coverflow>a>img{
 width:100%;
 height:100vh;
 margin: auto;
  }

/*動畫關鍵影格*/
@-webkit-keyframes silder {
    5% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    50% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    83% {
        opacity: 0;
        filter: alpha(opacity=0);
    }
}
@keyframes silder {
    5% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    50% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    83% {
        opacity: 0;
        filter: alpha(opacity=0);
    }
}


/*每個圖片各延遲5秒*/
.coverflow>a:nth-child(6) {
-webkit-animation-delay: 25s;
        animation-delay: 25s;            
}
.coverflow>a:nth-child(5) {
-webkit-animation-delay: 20s;
        animation-delay: 20s;            
}
.coverflow>a:nth-child(4) {
-webkit-animation-delay: 15s;
        animation-delay: 15s;            
}
.coverflow>a:nth-child(3) {
-webkit-animation-delay: 10s;
        animation-delay: 10s;            
}

.coverflow>a:nth-child(2) {
-webkit-animation-delay: 5s;
        animation-delay: 5s;
}

.coverflow>a:nth-child(1) {
-webkit-animation-delay: 0s;
        animation-delay: 0s;    
}
.button {
    background-color: style="background-color:rgba(255, 99, 71, 0);";
    border: 2px solid #ffffff;
    border-radius: 12px;
    color: white;
    padding: 20px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: "Comic Sans MS", cursive, sans-serif;
    font-style: italic;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.buttontwo {
    background-color: style="background-color:rgba(255, 99, 71, 0);";
    color: white;
    padding: 20px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: "Comic Sans MS", cursive, sans-serif;
    font-style: italic;
    font-size: 24px;
    margin: 4px 2px;
    cursor: pointer;
}
.container {
    position: absolute;
    top:0;
    width: 100%;
    margin: 0 auto;
}
.container .content {
    position: absolute;
    top:0;
    background: rgba(0, 0, 0, 0.5); /* Black background with transparency */
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
}
#mwt_mwt_slider_scroll
{
 top: 0;
 left:-250px;
 width:250px; 
 position:fixed;
 z-index:9999;
}

#mwt_slider_content{
 background:rgb(60, 60, 60);
 text-align:center;
 padding-top:50px;
 height:100%;
}

#mwt_fb_tab {
 position:absolute;
 top:0px;
 right:-24px;
 width:24px;
 background:rgb(60, 60, 60);
 color:#ffffff;
 font-family:Arial, Helvetica, sans-serif; 
 text-align:center;
 padding:9px 0;
 height:27%;

 -moz-border-radius-topright:10px;
 -moz-border-radius-bottomright:10px;
 -webkit-border-top-right-radius:10px;
 -webkit-border-bottom-right-radius:10px; 
}
#mwt_fb_tab span {
 display:block;
 height:12px;
 padding:1px 0;
 line-height:12px;
 text-transform:uppercase;
 font-size:12px;
}
table, th, td {
    text-align: center;
    border-collapse: collapse;  
}
</style>
<script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
<script>
$(function(){
 var w = $("#mwt_slider_content").width();
//  $('#mwt_slider_content').css('height', ($(window).height() - 20) + 'px' ); 
 
 $("#mwt_fb_tab").mouseover(function(){
  if ($("#mwt_mwt_slider_scroll").css('left') == '-'+w+'px')
  {
   $("#mwt_mwt_slider_scroll").animate({ left:'0px' }, 600 ,'swing');
  }
 });
 
 
 $("#mwt_slider_content").mouseleave(function(){
  $("#mwt_mwt_slider_scroll").animate( { left:'-'+w+'px' }, 600 ,'swing'); 
 }); 
});

</script>
</head>

<body>


<div class="coverflow" >
 <a ><img src="/src/home1.jpg"></img></a>
 <a ><img src="/src/home2.jpg"></img></a>
 <a ><img src="/src/home3.jpg"></img></a>
 <a ><img src="/src/home4.jpg"></img></a>
 <a ><img src="/src/home5.jpg"></img></a>
 <a ><img src="/src/home6.jpg"></img></a>
</div>



<div class="container">
  <div >
 <img src="/src/15360321929564.png" width="55%" style="display:block; margin:auto;"></img>
    <p style="text-align: center" ><a href="./newpicturepersonal.php" class="button">Picture Your Way</a></p>
 <p style="text-align: center;color:white" ></p>
    
  </div>
</div>

<div id="mwt_mwt_slider_scroll">
   <div id="mwt_fb_tab">
   <span> </span>
   <span>M</span>
   <span>o</span>
   <span>r</span>
   <span>e</span>
   <span> </span>
   <span>A</span>
   <span>b</span>
   <span>o</span>
   <span>u</span>
   <span>t</span>
  </div>
  <div id="mwt_slider_content">
  
  
    
    <a href="./readtwo.php">操作說明 <br> Operation Instruction</a>
    <a href="./abouttwo.php">研究理念 <br> Research Concept</a>
    <a href="./datatwo.php">參考文獻 <br> References</a>
    <a href="./usfour.php">關於我們 <br>About us</a>
  
    
  </div>
</div>
</body>
</html>