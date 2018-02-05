<?php
    session_start();
    // $_SESSION['GG'][] = ["id"=>"1", "name"=>"dd"];
    // $_SESSION['GG'][] = ["id"=>"2", "name"=>"cc"];
    // $_SESSION['GG'][] = ["id"=>"3", "name"=>"gg"];
    // $_SESSION['GG'][] = ["id"=>"4", "name"=>"aa"];
    // print_r($_SESSION['GG']);

    
    

    if(empty($_SESSION['GG'])){
        $_SESSION['GG'][] = ["id"=>"1", "name"=>"cc","qty"=>"1"];
        $_SESSION['GG'][] = ["id"=>"4", "name"=>"gg","qty"=>"1"];
    }
    else{
        $new = array_combine(array_keys($_SESSION['GG']), array_column($_SESSION['GG'], 'name'));
        $search = array_search('gg', $new);

        if((string)$search != "")
        {
            $_SESSION['GG'][$search]['qty'] = $_SESSION['GG'][$search]['qty'] + 1;
        }
    }

    array_splice($_SESSION['GG'], 0 , 1);
    
    print_r($_SESSION['GG']);

    // for($i=0; $i < count($_SESSION['GG']);$i++){
    //     echo $_SESSION['GG'][$i]['id']."<br>";
    // }

    //session_destroy();
?>