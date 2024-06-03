<?php
include 'connection.php';
if($_SERVER["REQUEST_METHOD"]== "POST") {
    //Get para recoger info e los posicionales
    $ID = $_POST['ID'];
    $value = $_POST['value'];
    $query = 
    "UPDATE teams t 
        SET t.teamValue=(t.teamValue+'$value'),t.treasury = (t.treasury - '$value')
        WHERE t.ID = '$ID'";

    $results = mysqli_query($connection,$query);
    $val = array();
    if($results){
        $val['response']= '100';
        echo json_encode($val);

    }else{
        $val['response'] = '404';
        echo json_encode($val);
    }
}
