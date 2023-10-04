<?php
session_start();
if(!$_SESSION['username']){
	header("Location: auth.php");
	exit;
}
$theme = $_POST['theme'];
$sender = $_POST['sender'];
$appeal = $_POST['appeal'];
$datecreated =  date("Y-m-d");
$user = $_SESSION['username'];
include "connect.php";
$query = "SELECT * FROM `user` WHERE name='$user';";
$result = $mysqli->query($query);
while ($row=mysqli_fetch_array($result)) {
	$id_users = $row['id'];
}
$sql = "INSERT INTO `tasks` (`id`, `theme`, `appeal`, `date`, `status`, `user`, `user_displayname`) VALUES (NULL, '$theme', '$appeal', '$datecreated', '1', '$user', '$id_users');";
    if (mysqli_query($mysqli, $sql)) {
        //echo "<script>alert('Запись добавлена!')</script>";
        header("Location: open_applications.php");
       
  } else {
        echo "Запись не добавлена:(";
  }
?>