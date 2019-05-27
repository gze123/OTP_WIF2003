<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include_once("config.php");
    if($_SESSION['logged_in'] == true ){
        $allPlaces = array();
        $sqlFetchTrips = "SELECT * from savedPlace WHERE userid = '$userid'";
        $result = $pdo->query($sqlFetchTrips);
        while($row = $result ->fetch()){
            array_push($allPlaces,$row);
        } 
        $results = json_encode($allPlaces);
    
        echo $results;
    }else{
        echo"Unauthorized Access!"
;    }
    
        
       
?>