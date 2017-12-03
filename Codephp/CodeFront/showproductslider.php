<?php 
    $callproduct = "SELECT * FROM `Product` p
    INNER JOIN `IMGProductDetail` imgd on imgd.`id_product` = p.`id_product`
    INNER JOIN `IMGProduct` imgp on imgp.`id_imgProduct` = imgd.`id_imgProduct` 
    INNER JOIN  `Story`s on p.`id_story` = s.`id_story`
    WHERE imgd.NumberIMGProduct = '1' LIMIT 6";
    $querylistproduct = mysqli_query($connect,$callproduct);
    // $setshow = true;
    if($querylistproduct){
        $setactive = "active";
        $check = true;
        while($row = mysqli_fetch_array($querylistproduct)){
    ?>

    <div class="item <?php if($check){echo $setactive;} ?>">
		<div class="col-xs-12 col-sm-6 col-md-2">
			<a href="#">
				<img src="<?php echo $row['url_img']."".$row['Name_img'];?>" class="img-responsive center-block">
			</a>
			<h4 class="text-center"><?php echo $row['NameProduct']; ?></h4>
			<h5 class="text-center"><?php echo number_format($row['PriceProduct']); ?></h5>
			<div class="hoverproduct">
			    <a href="Detailproduct.php?idproduct=<?php echo $row['id_product'];?>" class="btn btn-default view-details-btn leftproduct">สินค้าตัวอย่าง</a>
			</div>
		</div>
    </div>

    <?php
        $check = false;
    }
}
else{
    echo '<script>alert("ไม่สามารถเรียกสินค้าได้");</script>';
}
mysqli_close($connect);

?>

            
        