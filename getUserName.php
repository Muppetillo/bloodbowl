<?php
//Login y devolucion de ID
include 'connection.php';
if($_SERVER["REQUEST_METHOD"]== "GET") {
    $ID = $_GET['ID'];    
    $query = "SELECT u.name
    FROM users u 
    WHERE id = '$ID'";
    $results = mysqli_query($connection,$query);
    $val = array();
    if(mysqli_num_rows($results)>0){
        while($res = mysqli_fetch_assoc($results)){
            $val['response']= '100';
            $val['data'][] = $res;
            
        }
        echo json_encode($val);
    }else{
        $val['response'] = '404';
        echo json_encode($val);
    }
}

