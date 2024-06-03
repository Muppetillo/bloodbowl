<?php
include 'connection.php';
//Recoleccion todas las razas
if($_SERVER["REQUEST_METHOD"]== "GET") {
    $name = $_GET["name"];
    $faction_Id = $_GET["faction_Id"];
    $user_Id = $_GET["user_Id"];
    $query = "SELECT t.ID FROM teams t WHERE t.name = '$name' AND t.faction_Id = '$faction_Id' AND t.user_Id = '$user_Id'";
    $results = mysqli_query($connection,$query);
    $val = array();
    if(mysqli_num_rows($results)>0){
        while($res = mysqli_fetch_assoc($results)){
            $val['response']= "100";
            $val['data'][] = $res;
        
        }
        echo json_encode($val);
    }else{
        $val['response'] = "There is no data";
        echo json_encode($val);
    }
}