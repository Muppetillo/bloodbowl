<?php
include 'connection.php';
if($_SERVER["REQUEST_METHOD"]== "GET") {
    //Get para recoger info e los posicionales
    $faction_Id = $_GET['faction_Id'];
    $query = "SELECT SUBSTRING(p.name,4) As name, p.ma,p.st,p.ag,p.pa,p.av,GROUP_CONCAT(ps.skill_Id) As 'skills' ,p.price,p.maxQty
    FROM positionals p 
    LEFT JOIN positionals_skills ps ON p.name = ps.positional_Id
    WHERE p.faction_Id = '$faction_Id'
    GROUP BY p.name, p.ma,p.st,p.ag,p.pa,p.av,p.price,p.maxQty";
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

