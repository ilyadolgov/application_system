<?php
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
if($_SESSION['user_role'] == 'admin') {
?>
	<h1>Пользователи</h1>
<?php 
require_once 'connect.php';
$query = "SELECT user.name, user.displayname,role.role, user.date_of_creation FROM role INNER JOIN user ON role.id = user.role ORDER BY user.date_of_creation;";
$result = $mysqli->query($query);
echo "<table border='1' class='tableadminka'>";
echo "<thead><tr><th>Отображаемое имя</th><th>Логин</th><th>Права доступа</th>
<th>Дата создания пользователя</th><th>Изменить</th>
<th>Удалить пользователя</th><th>Доступность пользователя</th></thead>";
while ($row=mysqli_fetch_array($result)) {
	echo "<tr>";
    echo "<td>".$row['displayname']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['role']."</td>";
    echo "<td>".$row['date_of_creation']."</td>";
    echo "<td>Изменить</td>";
    echo "<td>Удаление пользователя</td>";
    echo "</tr>";
}    
echo "</table>"; 
}

else{
    
    header("Location: no_access.php");
}

?>
</body>
</html>
