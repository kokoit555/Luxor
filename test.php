<?php

    $gg[] = ["id"=>"1", "name"=>"dd"];
    $gg[] = ["id"=>"2", "name"=>"cc"];
    $gg[] = ["id"=>"3", "name"=>"gg"];

    print_r($gg);

    $new = array_combine(array_keys($gg), array_column($gg, 'name'));
    
    $search = array_search('gg', $new);

    echo $gg[$search]['name'];

?>