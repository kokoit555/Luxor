<?php

    include "../connectdb.php";

	$select = "SELECT * FROM `product` p
                INNER JOIN imgproductdetail ipd ON ipd.id_product = p.id_product AND ipd.namethumbProduct = '1'
                INNER JOIN imgproduct ip ON ip.id_imgProduct = ipd.id_imgProduct
                INNER JOIN typeproduct tp ON tp.id_typeProduct = p.id_type";
    $outp = "";
    $query = mysqli_query($connect,$select);

   
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_array($query)){
            if($outp!=""){$outp.=",";}
            $outp .= '{"id":"'.$row['id_product'].'",';
            $outp .= '"nameproduct":"'.$row['NameProduct'].'",';
            $outp .= '"productDetail":"'.$row['productDetail'].'",';
            $outp .= '"dateinput":"'.$row['date_input'].'",';
            $outp .= '"idtype":"'.$row['id_type'].'",';
            $outp .= '"nameTypeProduct":"'.$row['nameTypeProduct'].'",';
            $outp .= '"urlimg":"'.$row['url_img'].$row['Name_img'].'",';
            $outp .= '"priceproduct":"'.$row['PriceProduct'].'"}';
        }
        $outp = '{"records":['.$outp.']}';
        echo ($outp);
    }

?>