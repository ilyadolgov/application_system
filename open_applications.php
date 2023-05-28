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
?>
	<h1>Открытые заявки</h1>
<?php 
require_once 'connect.php';
$loginname = $_SESSION['username'];
$query = "SELECT * FROM `tasks` WHERE sender='$loginname'";
$result = $mysqli->query($query);
echo "<table border='1' class='tableadminka'>";
echo "<thead><tr><th>id</th><th>Отправитель</th><th>Тема</th></thead>";
while ($row=mysqli_fetch_array($result)) {
	echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['sender']."</td>";
    echo "<td>".$row['theme']."</td>";
    echo "</tr>";
}    
echo "</table>"; 
	?>
</body>
</html>
