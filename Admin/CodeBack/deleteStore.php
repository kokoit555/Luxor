<?php 

    include "./connectdb.php";

    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id;
    
    $select = "SELECT * FROM store WHERE id_store = $id;";
    $query = mysqli_query($connect,$select);
    $img = mysqli_fetch_array($query);

    $sqldelete = "DELETE FROM `store` WHERE `id_store` = '".$id."';";
    $nameurlimg = "../../".$img['AvatarStore'];
   
    if(mysqli_query($connect,$sqldelete)){echo "Delete Complete"; unlink("$nameurlimg");} else{echo "Delete False";}
    
        
    mysqli_close($connect);
?>