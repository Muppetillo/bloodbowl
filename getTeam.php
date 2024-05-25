<?php
include 'connection.php';
//Recoleccion todas las razas
if($_SERVER["REQUEST_METHOD"]== "GET") {
    $ID = $_GET["ID"];
    $query = "SELECT f.name AS faction , t.* FROM teams t JOIN factions f ON t.faction_Id = f.ID WHERE t.ID = '$ID'";
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
}