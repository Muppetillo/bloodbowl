<?php
//Insercion de nuevo usuario
if($_SERVER["REQUEST_METHOD"]== "POST"){
    require_once 'connection.php';
    
    $name = $_POST['name'];
    $team_Id = $_POST['team_Id'];
    $faction_Id = $_POST['faction_Id'];
    
    $query = "INSERT INTO `players`( `MA`, `ST`, `AG`, `PA`, `AV`, `VALUE`, `positional_Id`, `team_Id`) 
    SELECT ps.ma, ps.st, ps.ag,ps.pa,ps.av, ps.price,ps.name,'$team_Id'
    FROM positionals ps
    WHERE ps.name LIKE '%{$name}' AND ps.faction_Id = '$faction_Id';";
    
    $result = mysqli_query($connection,$query);
    if($result){
        $val['response']= '100';
        echo json_encode($val);

    }else{
        $val['response'] = '404';
        echo json_encode($val);
    }
}

