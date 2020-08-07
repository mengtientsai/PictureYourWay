<!DOCTYPE html>

<html  lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
<script src="jquery-3.3.1.min.js"></script>
<meta charset="UTF-8"></meta>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>

<style>
body {font-family: "Times New Roman", Georgia, Serif;
 margin: 0;
 }
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
table, th, td {
    border: 1px solid black;
    text-align: center;

}
/* Create three unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
}
/* Left and right column */
.column.side {
    width: 25%;
}
/* Middle column */
.column.middle {
    width: 50%;
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
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

function getRandom(){
    return Math.floor(Math.random()*3986)+2;
}


function change(t){
	var n1=getRandom();
	var n2=getRandom();
	var picone=document.getElementById("picone").src;
	var pictwo=document.getElementById("pictwo").src;
	var now1=parseInt(picone.substring(picone.indexOf("pic")+3,picone.indexOf(".jpg")));
	var now2=parseInt(pictwo.substring(pictwo.indexOf("pic")+3,pictwo.indexOf(".jpg")));
	while(n1==n2||n1==now1||n1==now2||n2==now1||n2==now2){
		n1=getRandom();
		n2=getRandom();
	}
	if(t==1){		
       
		document.getElementById("picone").src='/src/pic'+n1+'.jpg';
		document.getElementById("pictwo").src='/src/pic'+n2+'.jpg';
    $.ajax({
        url:'oldindex.php',
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
    })
	}
    else if(t==2){
		document.getElementById("picone").src='/src/pic'+n1+'.jpg';
		document.getElementById("pictwo").src='/src/pic'+n2+'.jpg';
        $.ajax({
        url:'oldindex.php',
        data:{
            button:2,
            prep1:now1,
            prep2:now2

        },
        type:"POST",
        dataType:'text',
        
    })
	}
}
</script>
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="./playpersonal.php" class="w3-bar-item w3-button">Pick your Pic</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="./playpersonal.php" class="w3-bar-item w3-button">Homepage</a>
    </div>
  </div>
</div>

<div class="w3-container w3-padding-64">
    <h1>Picture</h1><br></br>
    <p>You can pick a picture you like.</p>
    <p style="text-align:center" class="w3-text-blue-grey w3-large"><b>Pick a picture you like!</b></p> 
   
    
    
     <div class="row">
 <div class="column side">
 </div>
 <div class="column middle">
    <table>
  <tr>
    <td>Picture 1</td>
    <td>Picture 2</td>
  </tr>
  <tr>
    <td><img id="picone" src="/src/pic<?php echo rand(2,1995)?>.jpg" class="w3-round w3-image w3-opacity-min" alt="picone" width="400" height="600"/></td> 
    <td><img id="pictwo" src="/src/pic<?php echo rand(1996,3988)?>.jpg" class="w3-round w3-image w3-opacity-min" alt="pictwo" width="400" height="600"/></td>
  </tr>

   <tr>
      <td><p>
    <button class="w3-button w3-light-grey w3-section" type="submit" onclick='change(1)'>Pick this!</button></p></td>
      <td><p><button class="w3-button w3-light-grey w3-section" type="submit" onclick='change(2)'>Pick this!</button></p></td>
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