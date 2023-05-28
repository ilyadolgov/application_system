<?php
session_start();
if(!$_SESSION['username']){
	header("Location: auth.php");
	exit;
}

?>
<html>
    <head>
        <title>Система заявок пользователей</title>
        <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php
$username = $_SESSION['username'];
require_once ('navigation.php');
?>
<br>

<form action='tel.php' method='POST'>
    <div class='aplications'>
    Тема заявки <input type='text' class="text-field__input" name = 'theme'>
    Отправитель заявки<input type='text' name = 'sender' value=<?php echo $username; ?> readonly>
    Текст обращения <textarea name='appeal'></textarea>
</textarea>
<button type="submit">Отправить</button>
<button type="submit" class="cancelbtn1">Отмена</button>
</div>
</form>
</body>
</html>