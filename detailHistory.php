<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/logo.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Farbic</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-mobi.css">
  	<link rel="stylesheet" type="text/css" href="css/media.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


  </head>
<body>
  <?php include 'Codephp/connectdb.php'; ?>
<?php
     include "header.php";
      $idorder = mysqli_escape_string($connect,$_GET['id_order']);
      $strSQL = "SELECT * FROM `order_product` WHERE id_order = '$idorder' ";
      $objQuery = mysqli_query($connect,$strSQL);
      $objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<style>
  
  section#fins {margin: 5% 0;}
#address  .form-group {
    margin-bottom: 5px;
    float: left;
    width: 100%;
}
#address .panel-body {
    padding: 0;
    margin-bottom: 6%;
}
#address .col-md-6.col-xs-12 {
    margin: 0.5% 0;
}
#address .form-control {
    display: block;
    width: 100%;
    height: 38px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    -webkit-box-shadow: 3px 2px 0px rgba(0,0,0,.075);
    box-shadow: 3px 2px 0px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.btn-more{
    color: #4e4e4e;
    background-color: #ffbd45;
    border-color: #ffcd72;
    font-size: 16px!important;
}
@media screen and (max-width: 767px){
.table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: none;
}
section#fins {margin-top: 5%;}
}
</style>
<section id="fins">
  <div class="container" style="margin-bottom:3%;">
    <h3 class="text-center">ใบสรุปรายการสั่งซื้อ</h3>
<div class="table-responsive">
    <table class="table">
    <tr>
      <td>OrderID</td>
      <td>
	  #<?=$objResult["id_order"];?></td>
    </tr>
    <tr>
      <td >ชื่อ</td>
      <td >
	  <?=$objResult["Name"];?></td>
    </tr>
    <td >นามสกุล</td>
      <td >
    <?=$objResult["LastName"];?></td>
    </tr>

    <tr>
      <td>ที่อยู่การจัดส่ง</td>
      <td><?=$objResult["Address"]." ".$objResult["Zip"];?></td>
    </tr>
    <tr>
      <td>เบอร์โทรศัพท์</td>
      <td><?=$objResult["Tel"];?></td>
    </tr>
    <tr>
      <td>อีเมล</td>
      <td><?=$objResult["Send_email_order"];?></td>
    </tr>
  </table>
</div>

  <br>
<div class="table-responsive">
    <table class="table">
  <tr>
    <td >sku</td>
    <td >ชื่อสินค้า</td>
    <td >ราคา</td>
    <td >จำนวน</td>
    <td >ราคา</td>
  </tr>
<?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM orderproductdetail WHERE id_order = '".$_GET["id_order"]."';";
$objQuery2 = mysqli_query($connect,$strSQL2);

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM `product` 
                INNER JOIN imgproductdetail ipd ON ipd.id_product = product.id_product
                WHERE product.id_product = '".$objResult2["id_product"]."' AND ipd.namethumbProduct = '".$objResult2["namethumbProduct"]."'";

		$objQuery3 = mysqli_query($connect,$strSQL3);
		$objResult3 = $objResult = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
		$Total = $objResult2["qty"] * $objResult3["PriceProduct"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?=$objResult2["id_product"];?></td>
		<td><?=$objResult3["NameProduct"];?></td>
		<td><?=$objResult3["PriceProduct"];?></td>
		<td><?=$objResult2["qty"];?></td>
		<td><?=number_format($Total,2);?></td>
	  </tr>
	  <?php
 }
  ?>
</table>
</div>
รวมทั้งหมด <?php echo number_format($SumTotal,2);?>฿

<?php
mysqli_close($connect);
?>
 <br>

   <div class="row" style="margin-top: 5%;">
  <div class="col-md-12">
    <a class="btn btn-default col-xs-6 center-block noborder btn-next" href="./DetailOrder.php?id_order=<?=$idorder?>">ย้อนกลับ</a>
    <a class="btn btn-default col-xs-6 center-block noborder btn-next" href="./Listproduct.php">เลือกดูสินค้าเพิ่มเติม</a>
  </div>
  </div>
</div>

</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>
