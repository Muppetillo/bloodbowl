<?php
include 'connection.php';
//Recoleccion todas las razas
$query = "SELECT * FROM factions";
$results = mysqli_query($connection,$query);
$val = array();
if(mysqli_num_rows($results)>0){
    while($res = mysqli_fetch_assoc($results)){
        $val['response']= "Success";
        $val['data'][] = $res;
        
    }
    echo json_encode($val);
}else{
    $val['response'] = "There is no data";
    echo json_encode($val);
}
