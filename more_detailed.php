<?php
session_start();
 
if(!$_SESSION['username']){
	header("Location: auth.php");
	exit;
}
?>
<html>
	<head>
		<title>Дополнительные детали</title>
        <link rel="stylesheet" href="styles/style.css">
        <script src="js/script.js"></script>
</head>
<body>
    <?php 

require_once ('navigation.php');
require_once 'connect.php';

$id_tasks = $_GET['id'];
$sql = "SELECT * FROM `tasks` WHERE id='$id_tasks';";
$result = $mysqli->query($sql);

echo "<table width=25%>";
while ($row=mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<th scope='row'>Тема</th>";
    echo "<td>".$row['theme']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Обращение</th>";
    echo "<td>".$row['appeal']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Дата создания заявки</th>";
    echo "<td>".$row['date']."</td>";
    echo "</tr>";
}
echo "<table>";
?>
</body>
</html>
