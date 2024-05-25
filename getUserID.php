<?php
include 'connection.php';
if($_SERVER["REQUEST_METHOD"]== "GET") {
    $userName = $_GET['userName'];
    $pwd = $_GET['pwd'];    
    $query = "SELECT u.ID
    FROM users u 
    WHERE name = '$userName' AND password = '$pwd'";
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
?>
