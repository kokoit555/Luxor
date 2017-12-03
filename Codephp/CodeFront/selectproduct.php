<?php
    $callproduct = "SELECT * FROM `Product` p
    INNER JOIN `TypeProduct` t on p.`id_type` = t.`id_typeProduct`
    INNER JOIN `IMGProductDetail` imgd on imgd.`id_product` = p.`id_product`
    INNER JOIN `IMGProduct` imgp on imgp.`id_imgProduct` = imgd.`id_imgProduct` 
    INNER JOIN  `Story`s on p.`id_story` = s.`id_story`
    WHERE imgd.NumberIMGProduct = '1'
    order by p.`id_product`";
    $querylistproduct = mysqli_query($connect,$callproduct);
    // $setshow = true;
    if($querylistproduct){
        while($row = mysqli_fetch_array($querylistproduct)){
            ?>
            <div class="col-md-3">
                <div class="product-box hover-circle text-center">
                    <div class="product-item">
                        <figure><img src="<?php echo $row['url_img']."".$row['Name_img'];?>" alt="product"></figure>
                        <h3 class="product-title"><?php echo $row['NameProduct']; ?></h3>
                        <h4 class="product-price">Pricce : <?php echo $row['PriceProduct']; ?></h4>
                    </div>
                    <div class="hoverly-item">
                        <a href="Detailproduct.php?idproduct=<?php echo $row['id_product'];?>" class="btn btn-default view-details-btn">สินค้าตัวอย่าง</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else{
        echo '<script>alert("ไม่สามารถเรียกสินค้าได้");</script>';
    }
    mysqli_close($connect);
?>