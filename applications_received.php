<?php
//файл с заявками пользователя поступившие (статус=поступившая)
session_start();
 
if(!$_SESSION['username']){
	header("Location: auth.php");
	exit;
}
?>
<html>
	<head>
		<title>Открытые заявки</title>
        <link rel="stylesheet" href="styles/style.css">
        <script src="js/script.js"></script>
</head>
<body>
    <?php 
require_once ('navigation.php');
?>
	<h1>Открытые заявки</h1>
<?php 
require_once 'connect.php';
$loginname = $_SESSION['username'];
//$query = "SELECT tasks.theme, tasks.user, tasks.date, status.status FROM status INNER JOIN tasks ON status.id_status = tasks.status;";
$query = "SELECT tasks.id, tasks.theme, user.displayname, user.name, tasks.date, status.status FROM user INNER JOIN (status INNER JOIN tasks ON status.id_status = tasks.status) ON user.id = tasks.user_displayname;";

$result = $mysqli->query($query);
echo "<table border='1' class='tableadminka'>";
echo "<thead><tr><th>Тема заявки</th><th>Отправитель заявки</th><th>Логин пользователя</th><th>Дата поступления</th><th>Статус заявки</th><th>Статус</th></thead>";
while ($row=mysqli_fetch_array($result)) {
	echo "<tr>";
    echo "<td><a href=more_detailed.php?id=".$row['id'].">".$row['theme']."</a></td>";
    echo "<td>".$row['displayname']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td>Принять заявку</td>";
    echo "</tr>";
}    
echo "</table>"; 
	?>
</body>
</html>
