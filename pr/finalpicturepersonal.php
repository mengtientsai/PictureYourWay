<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8"></meta>
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
    position:relative;
    border: 40px solid rgb(60, 60, 60);
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
.checkmark{
    position: absolute;
    display:none;
    width: 35px;
    height: 60px;
    border: solid rgb(60, 60, 60);
    border-width: 0 15px 15px 0;
    transform: rotate(45deg);
    top: calc(100% / 2 - 58px / 2);
    left: calc(100% / 2 - 46px / 2);
}
tbody > tr > td {
    position: relative;
}
.display_block{
    display:block !important;
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

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  display:none;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
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

</style>
<script>
var picnum;
var returnpic;
window.onbeforeunload = function() {
    return "Do you really want to leave our brilliant application?";
//if we return nothing here (just calling return;) then there will be no pop-up question at all
//return;
};
$(document).ready(function(){
    $.ajax({
        type:'POST',
        url: 'dbfinal.php',
        data:{'pic': localStorage.getItem("pic")},
        dataType:'json',
        success: function(response) {
            console.log(response['pic'])
            console.log(response['name'])
            console.log(response['toldscribe'])
            returnpic = response['pic']
            // for(i=0; i<response['pic'].length; i++){
            //     $(".content").find("table").append('<tr><td><a class="words">'+response['name'][i]+'</a><img src="/src/pic'+response['pic'][i]+'.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" /><div class="checkmark"></div><div class="block"></div></td><td><a class="words">'+response['toldscribe'][i]+'</a><div class="block"></div></td></tr>')
            // }
            // for(i=0; i<response['pic'].length; i=i+5){
            //     $(".content").find("table").append('<tr><td><a class="words">'+response['name'][i]+'</a><img src="/src/pic'+response['pic'][i]+'.jpg" class="w3-round w3-image show"  /><div class="checkmark"></div></td><td><a class="words">'+response['name'][i+1]+'</a><img src="/src/pic'+response['pic'][i+1]+'.jpg" class="w3-round w3-image show" /><div class="checkmark"></div></td><td><a class="words">'+response['name'][i+2]+'</a><img  src="/src/pic'+response['pic'][i+2]+'.jpg" class="w3-round w3-image show"  /><div class="checkmark"></div></td><td><a class="words">'+response['name'][i+3]+'</a><img src="/src/pic'+response['pic'][i+3]+'.jpg" class="w3-round w3-image show"/><div class="checkmark"></div></td><td><a class="words">'+response['name'][i+4]+'</a><img  src="/src/pic'+response['pic'][i+4]+'.jpg" class="w3-round w3-image show" /><div class="checkmark"></div></td></tr>')
            // }
            var k=1;
            for(i=0; i<response['pic'].length; i=i+5){
                $(".content").find("table").append('<tr>')
                
                for(j=0;j<5;j++){
                    if(typeof response['name'][i+j]!="undefined"){
                        $(".content tr:nth-child("+k+")").append('<td><a class="words">'+response['name'][i+j]+'</a><img src="/src/pic'+response['pic'][i+j]+'.jpg" class="w3-round w3-image show"  /><div class="checkmark"></div></td>')
                    }else{
                        $(".content tr:nth-child("+k+")").append('<td style="background:rgb(60,60,60)"></td>')
                    }
                }
                $("content").find("table").append('</tr>')
                k = k+1;
            }   
            document.getElementsByClassName("lds-default")[0].style.display="none";         
            // val() arr[0]
            $(".show").on("click",function(){
                console.log(response['name']);
                console.log(response['toldscribe']);

                    var imgshow= $(this)

                    picnum =parseInt($(this).attr('src').substring($(this).attr('src').indexOf("pic")+3,$(this).attr('src').indexOf(".jpg")));
                    temparray = response['pic'];
                    var index = 0

                    while(temparray[index]!=picnum){
                        index++
                    }
                    console.log(response['name'][index]);
                    console.log(response['toldscribe'][index]);

                    // index=temparray.findIndex(function(temparray){
                        
                    // })
                    // alert(index);
                if (imgshow.hasClass("opacity_02")){
                    imgshow.removeClass("opacity_02")   
                    imgshow.siblings(".checkmark").removeClass("display_block")
                    picnum=""  
                }
                else if($(".show").hasClass("opacity_02")){
                    var imgselected = $(".opacity_02")
                    imgselected.removeClass("opacity_02")   
                    imgselected.siblings(".checkmark").removeClass("display_block")   
                    imgshow.addClass("opacity_02")
                    imgshow.siblings(".checkmark").addClass("display_block")
                    $(".overlay").find("h2").html(response['name'][index])
                    $(".overlay").find(".content").html(response['toldscribe'][index])
                    $(".overlay").show()
                }else{
                    imgshow.addClass("opacity_02")
                    imgshow.siblings(".checkmark").addClass("display_block")
                    $(".overlay").find("h2").html(response['name'][index])
                    $(".overlay").find(".content").html(response['toldscribe'][index])
                    $(".overlay").show()
                }
                

            
            });
            
        }
    });
    $(".close").on("click",function(){
        $(".overlay").hide()
    })
    
    $(".finalbutton").one("click",function(){
        window.onbeforeunload=null;
        button = $(this)
        if(button.hasClass("none") && $(".checkmark").hasClass("display_block")==false){
            // alert(picnum+returnpic)

            var returnpicarr = JSON.stringify(returnpic)
            $.ajax({
                type:'POST',
                url: 'dbrecord.php',
                data:{'pic':returnpicarr, 'selectedpic' : picnum},
                dataType:'json',
                success: function(response) {
                    console.log(response)
                    window.location.href = "./index.php";

                }
            })
        }else if(button.hasClass("record") && $(".checkmark").hasClass("display_block")==false){
            alert("請勾選一個景點，再點選[確認送出]")
            location.reload();
        }else if(button.hasClass("none") && $(".checkmark").hasClass("display_block") == true){
            alert("您已有勾選的，請「勿」同時勾選又點選[都不想去]")
            location.reload();
        }else{
            var returnpicarr = JSON.stringify(returnpic)
            $.ajax({
                type:'POST',
                url: 'dbrecord.php',
                data:{'pic':returnpicarr, 'selectedpic' : picnum},
                dataType:'json',
                success: function(response) {
                    
                    window.location.href = "./index.php";

                }
            })
        }
    })
 
})

</script>
</head>

<body>


<!-- Table -->
<div class="w3-container w3-padding-64">
    <h2 style="text-align: center" ><b>測驗結束</b></h2>
    <div>
    </div>
    <div>
    <h2 style="text-align: center" ><b>選取一張圖片是您最想去的景點，並點選確認送出</b></h2>
    </div>
    <div>
    <h2 style="text-align: center"><b style="color: yellow">*點選圖片附有景點描述</b></h2>
    </div>
    <form action="/action_page.php" target="_blank">
   
    <div class="row">
	<div class="column middle content">
    <table>
    <!-- <tr>
		    <td>
                <a class="words">建築古蹟</a>
                <img id="show1" src="/src/pic3621.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td> 
		    <td>
                <a class="words">商圈娛樂</a>
                <img id="show2" src="/src/pic855.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            <td>
                <a class="words">體驗園區</a>
                <img id="show3" src="/src/pic867.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            <td>
                <a class="words">體驗園區</a>
                <img id="show3" src="/src/pic867.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            <td>
                <a class="words">體驗園區</a>
                <img id="show3" src="/src/pic867.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            
          </tr>
          <tr>
		    <td>
                <a class="words">建築古蹟</a>
                <img id="show1" src="/src/pic3621.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td> 
		    <td>
                <a class="words">商圈娛樂</a>
                <img id="show2" src="/src/pic855.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            <td>
                <a class="words">體驗園區</a>
                <img id="show3" src="/src/pic867.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            <td>
                <a class="words">體驗園區</a>
                <img id="show3" src="/src/pic867.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            <td>
                <a class="words">體驗園區</a>
                <img id="show3" src="/src/pic867.jpg" class="w3-round w3-image show" width="600" height="600" />
                <div class="checkmark"></div>
            </td>
            
          </tr> -->
		</table>
	</div>
	</div>
      
    </form>
    <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    <div style="text-align:center;">
    <!-- <td><a href="#" class="finalbutton w3-button">沒有想去的</a></td> -->
    <td><button class="finalbutton none">都不想去</button></td>
    <td><button class="finalbutton record">確認送出</button></td> 
    </div> 
  </div> 
  
 

  <div id="popup1" class="overlay">
	<div class="popup">
		<h2>Here i am</h2>
		<a class="close">&times;</a>
		<div class="content">
			Thank to pop me out of that button, but now i'm done so you can close this window.
		</div>
	</div>
</div>
</body>
</html>