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
    border: 5px solid white;
    text-align: center;
    border-collapse: collapse;  

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
    width: 70%;
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
img.show:hover{
    opacity:0.5;
    -webkit-transition: all 0.25s ease;
}
.checkmark{
    position: absolute;
    display:none;
    width: 35px;
    height: 60px;
    border: solid #fff;
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
.next-button{
    background: #000;

}
.next-button:hover{
    background: #fff;
}
</style>
<script type="text/javascript">


var select=[];
$(document).ready(function(){
    $(".show").on("click",function(){
        var imgshow= $(this)
        var picnum =parseInt($(this).attr('src').substring($(this).attr('src').indexOf("pic")+3,$(this).attr('src').indexOf(".jpg")));
        var index=select.indexOf(picnum)
        if(index>-1){
            imgshow.toggleClass("opacity_02")
            imgshow.siblings(".checkmark").toggleClass("display_block")
            select.splice(index,1)
        }
        else{
            if(select.length>=3){
                alert("已達選擇上限")
            }
            else{
                imgshow.toggleClass("opacity_02")
                imgshow.siblings(".checkmark").toggleClass("display_block") 
                select.push(picnum)
            }
        }
        
    });

    cluster = localStorage.getItem("show")
    clusterarray = cluster.split(',')
    var picid = 1; 
    clusterarray.forEach(function(element) {
        $("#show"+picid).attr("src","/src/pic"+element+".jpg");
        picid = picid+1 
    });

});
function selected(){
    var jsonselect=JSON.stringify(select);
    // alert(jsonselect)
    $.ajax({
        type:'POST',
        url: 'dbnew2.php',
        data:{'mydata' :jsonselect,
              'pic': localStorage.getItem("pic"),
              'rate': localStorage.getItem("rate"),
              'newcluster': localStorage.getItem("newcluster")},
        dataType:'json',
        success: function(response) {
            if(response['viewresult']==0){
                localStorage.setItem("pic", response['pic']);
                localStorage.setItem("rate", response['rate']);
                localStorage.setItem("newcluster", response['newcluster']);
                localStorage.setItem("show", response['show']);
                window.location.href = "./twopicturepersonal.php";
            }else{
                localStorage.setItem("pic", response['pic']);
                window.location.href = "./finalpicturepersonal.php";
                    
            }
        }
    });
}

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
  <div class="w3-bar w3-black w3-padding w3-right w3-hide-small" style="letter-spacing:4px;color: #f1f1f1;font-family:Verdana, Arial, Helvetica, sans-serif;">
    <a class="w3-bar-item w3-button "></a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small ">
    <a  class="w3-bar-item w3-button next-button" onclick="selected()">NEXT</a>
    </div>
  </div>
</div>


<!-- Table -->
<div class="w3-container w3-padding-64">
    <h2 style="text-align: center" ><b style="font-family: Microsoft JhengHei; font-size: 30px">請選取一至三張欲去的景點代表圖</b></h2>
    
    <form action="/action_page.php" target="_blank">
   
    <div class="row">
	<div class="column side">
	</div>
	<div class="column middle">
	<table>
		  <tr>
		    <td>
                <img id="show1" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
            </td> 

		    <td>
                <img id="show2" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
            <td>
                <img id="show3" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
            
          </tr>
		  <tr>
		    <td>
                <img id="show4" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" /> 
                <div class="checkmark"></div>
                </td>
            <td>
                <img id="show5" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
                </td>
            <td>
                <img id="show6" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
                </td>
          </tr>
		  <tr>
		    <td>
                <img id="show7" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" /> 
                <div class="checkmark"></div>
                </td>
            <td>
                <img id="show8" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
                </td>
            <td>
                <img id="show9" src="/src/black.jpg" class="w3-round w3-image w3-opacity-min show" width="600" height="600" />
                <div class="checkmark"></div>
                </td>
          </tr>
		</table>
	</div>
	<div class="column side">
	</div>
	</div>
      
    </form>
  </div> 

</body>
</html>