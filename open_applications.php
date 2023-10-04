<?php
//файл с заявками пользователя (Для клиента)
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

//Запрос на получение ID пользователя
$query = "SELECT * FROM `user` WHERE name='$loginname';";
$result = $mysqli->query($query);
while ($row=mysqli_fetch_array($result)) {
	$id_users = $row['id'];
}
$query = "SELECT tasks.theme, user.displayname, tasks.date, status.status FROM user INNER JOIN (status INNER JOIN tasks ON status.id_status = tasks.status) ON user.id = tasks.user_displayname WHERE user_displayname = '$id_users';";
$result = $mysqli->query($query);
echo "<table border='1' class='tableadminka'>";
echo "<thead><tr><th>Тема заявки</th><th>Отправитель заявки</th><th>Дата поступления</th><th>Статус заявки</th></thead>";
while ($row=mysqli_fetch_array($result)) {
	echo "<tr>";
    echo "<td>".$row['theme']."</td>";
    echo "<td>".$row['displayname']."</td>";
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "</tr>";
}    
echo "</table>"; 
	?>
</body>
</html>
