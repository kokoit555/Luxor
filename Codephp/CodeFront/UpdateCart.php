<?php
ob_start();
session_start();
	
if(empty($_POST["updateqty"]) || !isset($_POST["updateqty"]) || is_null($_POST["updateqty"])){$updateqty = 0;}
else{	$updateqty = $_POST["updateqty"]; }


  for($i=0;$i<= count($_SESSION["cartproductID"]);$i++)
  {
	  if($_SESSION["cartproductID"][$i] != "")
	  {
			$_SESSION["cartproductQTY"][$i] = $updateqty;
	  }
  }
	
	header("location: ../../Cartproduct.php");

?>