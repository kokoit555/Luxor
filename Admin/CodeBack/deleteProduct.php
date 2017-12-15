<?php 

    include "./connectdb.php";

    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id;
    
    $nameurlimg = "";
    $nameurlthumbimg = "";
    $sqldelete1 = "DELETE FROM `imgproductdetail` WHERE `id_product` = '".$id."'; ";
    $sqldelete2 = "DELETE FROM `product` WHERE `id_product` = '".$id."';";
    $selectimg = "SELECT `id_imgProduct`,`id_product`,`urlthumbProduct` FROM `imgproductdetail` WHERE `id_product` = '".$id."'; ";
    $sqldelete3 = array();

    if($queryselectidimg = mysqli_query($connect,$selectimg)){
        while($row = mysqli_fetch_array($queryselectidimg)){
            $selecturlimg = "SELECT * FROM `imgproduct` WHERE `id_imgProduct` = '".$row['id_imgProduct']."';";
            $sqldelete3[] = "DELETE FROM `imgproduct` WHERE `id_imgProduct` = '".$row['id_imgProduct']."'; ";

            echo $nameurlthumbimg = "../../".$row['urlthumbProduct'];
            unlink("$nameurlthumbimg");
            $nameurlthumbimg = "";
            
            if($queryurlimg = mysqli_query($connect,$selecturlimg)){
                while($row = mysqli_fetch_array($queryurlimg)){
                    echo $nameurlimg = "../../".$row['url_img']."".$row['Name_img'];
                    
                    unlink("$nameurlimg");
                    
                    $nameurlimg = "";
                }
            }
        }
    }
    else{
        echo "Select False";
    }

    if(mysqli_query($connect,$sqldelete1)){echo "Delete Complete";} else{echo "Delete False";}
    if(mysqli_query($connect,$sqldelete2)){echo "Delete Complete2";} else{echo "Delete False";}
    // if(mysqli_query($connect,"".$sqldelete3[0])){echo "Delete Complete3";} else{echo "Delete False";}
    for ($i=0; $i < count($sqldelete3); $i++) { 
        if(mysqli_query($connect,"".$sqldelete3[$i])){echo "Delete IMG Complete";}else{echo"Not Complete"." ".$i;}
    }
    
    mysqli_close($connect);
?>