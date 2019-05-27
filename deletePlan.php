<?php
session_start();
include("config.php");
if($_SESSION['logged_in'] == true){
  $tripID = $_POST['tripID'];
  $sql = "DELETE FROM trips WHERE TripID='$tripID'";
  $pdo->query($sql);
  header("Location: trip.php");

}else{
  echo "Unauthorized Access!";
}

?>

