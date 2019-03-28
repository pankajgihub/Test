<?php
if(isset($_GET['addqty'])){
	$newqty = $_GET['addqty'] + 1;	
	echo $newqty;
}
if(isset($_GET['minusqty']))
{
	 $newqty = $_GET['minusqty'] - 1;	
	 echo $newqty;
}
if(isset($_GET['plusadult'])){
	$newqty = $_GET['plusadult'] + 1;	
		echo $newqty;
}
if(isset($_GET['minusadults'])){
	$newqty = $_GET['minusadults'] - 1;	
		echo $newqty;
}
if(isset($_GET['pluschild'])){
	$newqty = $_GET['pluschild'] + 1;	
		echo $newqty;
}
if(isset($_GET['minuschild'])){
	$newqty = $_GET['minuschild'] - 1;	
		echo $newqty;
}
?>