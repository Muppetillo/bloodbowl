<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){
    require_once 'connection.php';
    
    $name = $_POST["name"];
    $faction_Id = $_POST["faction_Id"];
    $user_Id = $_POST["user_Id"];
    
    $query = "INSERT INTO teams 
        (name, user_id, faction_Id)
        VALUES('$name','$user_Id','$faction_Id');";
    
    $result = mysqli_query($connection,$query);
    if($result){
        echo json_encode("Data inserted");

    }else{
        echo json_encode("error occured");
    }
}
