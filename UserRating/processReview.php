<?php
include_once("config.php");
if(empty($_POST['text']) || empty($_POST['rating'])){
    header("Location: rateUs.php?action=empty");
}
if(isset($_POST['Submit']) && !empty($_POST['text']) && !empty($_POST['rating'])){

    try{
        $text=$_POST['text'];
        $rate = $_POST['rating'];
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usercomment values ('','WIF170041','$text','$rate',CURDATE())";
        $conn->exec($sql);
        echo "New record created successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
$conn = null;
header("Location: rateUs.php");
}


?>