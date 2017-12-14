<?php
ob_start();
session_start();
	
if(empty($_POST["updateqty"]) || !isset($_POST["updateqty"]) || is_null($_POST["updateqty"]))
{
	for ($i=0; $i <= count($_SESSION["cartproductID"]); $i++) { 
		if($_SESSION["cartproductID"][$i] == ""){
			$_SESSION["cartproductQTY"][$i] = 0;
		}
	}
}
else{	
		for ($i=0; $i < count($_POST['updateqty']) ; $i++) { 
			$updateqty[] = $_POST["updateqty"][$i];
		}
		for($i=0;$i<= count($_SESSION["cartproductID"]);$i++)
		{
			if($_SESSION["cartproductID"][$i] != "")
			{
				$_SESSION["cartproductQTY"][$i] = $updateqty[$i];
			}
			else{
				$_SESSION["cartproductQTY"][$i] = 0;
			}
		}
}


	header("location: ../../Cartproduct.php");

?>