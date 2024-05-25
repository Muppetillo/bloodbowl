<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){
    require_once 'connection.php';
    
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    
    $query = "INSERT INTO users 
        (name, password, email)
        VALUES('$name','$pwd','$email');";
    
    $result = mysqli_query($connection,$query);
    if($result){
        $val['response']= '100';
        echo json_encode($val);

    }else{
        $val['response'] = '404';
        echo json_encode($val);
    }
}
