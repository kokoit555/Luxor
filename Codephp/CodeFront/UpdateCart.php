<?php
ob_start();
session_start();
	
if(!empty($_POST["updateqty"]) || isset($_POST["updateqty"]) || !is_null($_POST["updateqty"]))
{
	for ($i=0; $i < count($_POST['updateqty']) ; $i++) { 
		$updateqty[] = $_POST["updateqty"][$i];
	}
	for($i=0;$i < count($_SESSION["cartProduct"]);$i++)
	{
		if($_SESSION["cartProduct"][$i]['NumberListProduct'] != "")
		{
			$_SESSION["cartProduct"][$i]['qtyproduct'] = $updateqty[$i];
		}
		else{
			$_SESSION["cartProduct"][$i] = 1;
		}
	}
}


	header("location: ../../Cartproduct.php");

?>