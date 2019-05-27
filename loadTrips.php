<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include_once("config.php");
    $status = $_GET['status1'];
    if($_SESSION['logged_in'] == true ){
        $alltrips = array();
        $today = date("Y-m-d");
        if($status=="upcoming"){
            $sqlFetchTrips = "SELECT * from trips WHERE DATE(startDate)>'$today' and userid = '$userid'";
        }else if($status=="past"){
            $sqlFetchTrips = "SELECT * from trips WHERE DATE(endDate) < '$today' and userid = '$userid'  ";
        }else{
            $sqlFetchTrips = "SELECT * from trips WHERE DATE(startDate) <= '$today' and DATE(endDate) >= '$today' and userid = '$userid'  ";
        }
            $result = $pdo->query($sqlFetchTrips);
        while($row = $result ->fetch()){
            array_push($alltrips,$row);
        } 
        $results = json_encode($alltrips);
        echo $results;
    }else{
        echo "Unauthorized Access!";
    }
    
        
       
?>