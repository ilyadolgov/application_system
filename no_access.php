<?php
session_start();
if(!$_SESSION['username']){
	header("Location: auth.php");
	exit;
}
?>

<html>
    <head>
        <title>Нет доступа</title>
        <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php
$username = $_SESSION['username'];
require_once ('navigation.php');
?>
<h3>Error 403:</h3>
<h1>FORBIDDEN:</h1>
<p>you don't have permission to access</p>
</body>
</html>

