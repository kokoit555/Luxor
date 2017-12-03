<?php

    include "../connectdb.php";

	$select = "SELECT * FROM `Product` p order by `id_product`";
    $outp = "";
    $query = mysqli_query($connect,$select);
    
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_array($query)){
            if($outp!=""){$outp.=",";}
            $outp .= '{"id":"'.$row['id_product'].'",';
            $outp .= '"nameproduct":"'.$row['NameProduct'].'",';
            $outp .= '"qty":"'.$row['qty'].'",';
            $outp .= '"priceproduct":"'.$row['PriceProduct'].'"}';
        }
        $outp = '{"records":['.$outp.']}';
        echo ($outp);
    }

    mysqli_close($connect);
?>