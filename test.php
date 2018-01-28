<?php
    session_start();
    // $gg[] = ["id"=>"1", "name"=>"dd"];
    // $gg[] = ["id"=>"2", "name"=>"cc"];
    // $gg[] = ["id"=>"3", "name"=>"gg"];

    $_SESSION['GG'][] = ["id"=>"1", "name"=>"dd"];
    $_SESSION['GG'][] = ["id"=>"2", "name"=>"cc"];
    $_SESSION['GG'][] = ["id"=>"3", "name"=>"gg"];
    // print_r($_SESSION['GG']);

    $new = array_combine(array_keys($_SESSION['GG']), array_column($_SESSION['GG'], 'name'));
    
    $search = array_search('gg', $new);

    //echo $_SESSION['GG'][$search]['name'];
    for($i=0;$i<count($_SESSION['GG']);$i++){
            echo $_SESSION['GG'][$i]['id']."<br>";
    }

?>