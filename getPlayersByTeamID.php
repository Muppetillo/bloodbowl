<?php
include 'connection.php';
if($_SERVER["REQUEST_METHOD"]== "GET") {
    //Get para recoger info e los posicionales
    $team_Id = $_GET['team_Id'];
    $query = "SELECT 
    p.ID,p.name ,p.number 
    ,p.MA ,p.ST 
    ,p.AG ,p.PA 
    ,p.AV ,p.VALUE 
    ,p.MNG ,p.SPP 
    ,p.TD ,p.CAS 
    ,p.COM ,p.INTF 
    ,p.MVP ,SUBSTRING(p.positional_Id,4) AS positional 
    ,p.team_Id ,GROUP_CONCAT(ps.skill_Id) AS 'Skills' 
FROM players p 
JOIN positionals_skills ps ON p.positional_Id = ps.positional_Id 
WHERE team_Id = '$team_Id'
GROUP BY p.ID, p.name ,p.number ,p.MA ,p.ST ,p.AG ,p.PA ,p.AV ,p.VALUE ,p.MNG ,p.SPP ,p.TD ,p.CAS ,p.COM ,p.INTF ,p.MVP ,p.positional_Id ,p.team_Id";

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


