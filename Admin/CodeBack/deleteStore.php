<?php 

    include "../connectdb.php";

    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id;
    
    $sqldelete = "DELETE FROM `store` WHERE `id_store` = '".$id."';";
   
    if(mysqli_query($connect,$sqldelete)){echo "Delete Complete";} else{echo "Delete False";}
    
        
    mysqli_close($connect);
?>