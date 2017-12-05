<?php

    include "../connectdb.php";

	$select = "SELECT * FROM `Store` s order by `id_store`";
    $outp = "";
    $query = mysqli_query($connect,$select);
    
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_array($query)){
            if($outp!=""){$outp.=",";}
            $outp .= '{"id_store":"'.$row['id_store'].'",';
            $outp .= '"NameStore":"'.$row['NameStore'].'",';
            $outp .= '"TelStore":"'.$row['TelStore'].'",';
            $outp .= '"EmailStore":"'.$row['EmailStore'].'"}';
        }
        $outp = '{"records":['.$outp.']}';
        echo ($outp);
    }

    mysqli_close($connect);
?>