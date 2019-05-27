<!-- <?php
    session_start();
    $placeID = $_GET['placeID'];
    include_once("config.php");
    if($_SESSION['logged_in'] == true){
        $sql = "DELETE FROM savedPlace WHERE placeID='$placeID'";
        $pdo->query($sql);
        header("Location: myPlace.php");
        
        
    }else{
        echo "Unauthorized Access!";
    }
   


?> -->