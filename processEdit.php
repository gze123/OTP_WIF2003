<?php
session_start();
include_once("config.php");
$userID = $_SESSION['user_id'];
$newName  = $_POST['newName'];
$password = $_POST["newPassword"];
if (empty($_POST['newName']) && empty($_POST['newPassword'])) {
    header('Location: profile.php?status=nothingChange');
} else if (empty($_POST['newPassword']) && isset($_POST['newName'])) {
    $sql = "UPDATE members SET name='$newName' WHERE userID='$userID'";
    $pdo->query($sql);
    $pdo = null;
    header('Location: profile.php?status=changeName');
} else if (empty($_POST['newName']) && isset($_POST['newPassword'])) {
    $sql = "UPDATE members SET password='$hashedPassword' WHERE userID='$userID'";
    $pdo->query($sql);
    $pdo = null;
    header('Location: profile.php?status=changePassword');
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE members SET name='$newName',password='$hashedPassword' WHERE userID='$userID'";
    $pdo->query($sql);
    $pdo = null;
    header('Location: profile.php?status=profileUpdated');
}
