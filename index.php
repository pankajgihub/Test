<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- Font Awesome include-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
<title>Test</title>
</head>
<style>
	body{color:blue;}
	.mheading1{    padding: 1% 10%;
    font-size: 19px;}
    .minput1{    border: none;width: 15%;
    padding-left: 3%;}
    .inputm{border: 2px solid blue;
    background-color: blue;
    color: #fff;
    font-weight: 900;
    border-radius: 50%;
    width: 20%;}
    .inputp{border: 2px solid red;
    background-color: red;
    color: #fff;
    font-weight: 900;
    border-radius: 50%;
    width: 20%;}
    .mtable1{width: 80%;
    border: 1px solid #dddddd;}
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{    vertical-align: middle;}
    td.dis {background:#999; 
    pointer-events: none;}

</style>
<body>
<div class="container">
	 <div class="row">
	 	<div class="mheading1"><i class="fa fa-users" aria-hidden="true"></i> Choose number of<b> people</b></div>
	 	<table class="table table-striped mtable1"  align="center">
	 		<tr>

	 			<td class="col-md-3  ">  
         <i class="fa fa-check enableroom" aria-hidden="true"  ></i> |
          <i class="fa fa-close disableroom" aria-hidden="true"  ></i> | 
          <i class="fa fa-bed" aria-hidden="true"></i></td>
	 			<td class="col-md-7 room">ROOMS</td>
	 			<td class="col-md-2 room">
	 				<input type="button" value="-" class="inputm" name="mroom" id="mroom" onclick="minusqty();">
	 				<input type="text" value="1" class="minput1" name="iroom"  id="iroom" readonly>
	 				<input type="button" value="+" class="inputp" onclick="addqty();" name="proom" id="proom">
	 			</td>
            </tr>
           

           <tr>
	 			<td class="col-md-3">
       <i class="fa fa-check enableadults" aria-hidden="true"  ></i> |
          <i class="fa fa-close disableadults" aria-hidden="true"  ></i> | 
         <i class="fa fa-user" aria-hidden="true"></i></td>
	 			<td class="col-md-7 adults">ADULTS</td>
	 			<td class="col-md-2 adults">
	 				<input type="button" value="-" class="inputm" id="minusadult" onclick="minusadults();">
	 				<input type="text" value="1" class="minput1" id="inpadult" readonly>
	 				<input type="button" value="+" class="inputp" id="plusadult" onclick="addadults();">
	 			</td>
            </tr>
            <tr>
	 			<td class="col-md-3">
 <i class="fa fa-check enablechild" aria-hidden="true"  ></i> |
          <i class="fa fa-close disablechild" aria-hidden="true"  ></i> | 
         <i class="fa fa-child" aria-hidden="true"></i></td>
	 			<td class="col-md-7 child">CHILDREN</td>
	 			<td class="col-md-2 child">
	 				<input type="button" value="-" class="inputm"id="minuschild" onclick="minuschild();">
	 				<input type="text" value="0" class="minput1" id="inpchild" readonly>
	 				<input type="button" value="+" class="inputp" id="pluschild" onclick="addchild();">
	 			</td>
            </tr>


	 	</table>
	 </div>
	</div>
 
</body>
</html>
<script>
 
  
$(document).ready(function(){
  // enable disable room
  $("i.disableroom").click(function(){
    $("td.room").addClass("dis");
  });
  $("i.enableroom").click(function(){
     $("td.room").removeClass("dis");
  });
  //enable disable adults
 $("i.disableadults").click(function(){
    $("td.adults").addClass("dis");
  });
  $("i.enableadults").click(function(){
     $("td.adults").removeClass("dis");
  });
//enable disable childrens
 $("i.disablechild").click(function(){
    $("td.child").addClass("dis");
  });
  $("i.enablechild").click(function(){
     $("td.child").removeClass("dis");
  });

 
 }); 
  
	// -----------code to add qty of rooms-------------
	function addqty(){ 
	  var qty = $("#iroom").val();
 		if(qty >= 5) {
 			alert("Room Quantity Should Not Less Than 1 & More Than 5.");
 		}else{
        $.ajax({
          url:"ajax.php?addqty="+qty,
          type:"POST",
          success:function(res)
          { //alert(res);
              document.getElementById("iroom").value = res;	
             addadults();
          }
      });
   }
	}
	// -----------code to Minus qty of rooms-------------
	function minusqty(){ 
	  var qty = $("#iroom").val();
 		if(qty == 1) {
 			alert("Room Quantity Should Not Less Than 1.");
 		}else{
        $.ajax({
          url:"ajax.php?minusqty="+qty,
          type:"POST",
          success:function(res)
          { //alert(res);
              document.getElementById("iroom").value = res;	
             childrenSetZero();
          }
      });
   
	}
}
// -----------code to add qty of adults-------------
 function addadults(){ 
 var qty = $("#inpadult").val();
var rooms = $("#iroom").val();
var adults = $("#inpadult").val();
var childrens = $("#inpchild").val();
var totalir = parseFloat(adults) + parseFloat(childrens);
 	//alert(rooms);
     if(rooms == 5 && totalir >= 20){ 

     	alert("We Have only 5 rooms So peoples count is not more than 20.");
     }else{
 		  $.ajax({
          url:"ajax.php?plusadult="+qty,
          type:"POST",
          success:function(res)
          { //alert(res);
              document.getElementById("inpadult").value = res;	
              roomwiseqty();
          }
      });
   }}
	 
	 // minus adults
	 function minusadults(){ 

	  var qty = $("#inpadult").val();
	  if(qty == 0) {
 			alert("Adults Quantity Should Not Less Than 0.");
 		}else{
 		  $.ajax({
          url:"ajax.php?minusadults="+qty,
          type:"POST",
          success:function(res)
          { //alert(res);
              document.getElementById("inpadult").value = res;	 

          }
      });
   
	}
 
 }
 // -----------code to add qty of child-------------
	function addchild(){ 
	  var qty = $("#inpchild").val();
	  var rooms = $("#iroom").val();
var adults = $("#inpadult").val();
var childrens = $("#inpchild").val();
var totalir = parseFloat(adults) + parseFloat(childrens);
 	//alert(rooms);
     if(rooms == 5 && totalir >= 20){ 

     	alert("We Have only 5 rooms So peoples count is not more than 20.");
     }else{
 		  $.ajax({
          url:"ajax.php?pluschild="+qty,
          type:"POST",
          success:function(res)
          { //alert(res);
              document.getElementById("inpchild").value = res;	
             roomwiseqty();

          }
      });
   }}
 // minus adults
	 function minuschild(){ 

	  var qty = $("#inpchild").val();
	  if(qty == 0) {
 			alert("Childrens Quantity Should Not Less Than 0.");
 		}else{
 		  $.ajax({
          url:"ajax.php?minuschild="+qty,
          type:"POST",
          success:function(res)
          { //alert(res);
              document.getElementById("inpchild").value = res;	

          }
      });
   
	}
 
 }

function childrenSetZero(){
var rooms = $("#iroom").val();
var totalinroom = parseFloat(rooms) * 4;
document.getElementById("inpadult").value = totalinroom;	
document.getElementById("inpchild").value = 0;	
}


function roomwiseqty(){
var rooms = $("#iroom").val();
var adults = $("#inpadult").val();
var childrens = $("#inpchild").val();
var totalir = parseFloat(adults) + parseFloat(childrens);
var maxinroom = parseFloat(totalir)/4;
if(maxinroom > rooms){
alert("The Limit is only 4 peoples in one Room.");
addqty();
}

 }
</script>
