<?php
session_start();
if(!$_SESSION['username']){
	header("Location: auth.php");
	exit;
}
if($_SESSION['user_role'] == 'admin') {
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
<h2>Создание нового пользователя</h2>
<form action='new_user.php' method='POST'>
    <div class='aplications'>
    Отображаемое имя <input type='text' class="text-field__input" name = 'displayname'>
    Логин <input type='text' class="text-field__input" name = 'login'>
    Права доступа <select class="text-field__input" name = 'access'>
        <option>Администратор</option>
        <option selected="selected">Пользователь</option>
</select>
    Пароль <input type='password' class="text-field__input" name = 'passwd' required>
    Подтверждение пароля <input type='password' class="text-field__input" name = 'passwd2' required>
<button type="submit" name="but">Отправить</button>
<button type="submit" class="cancelbtn1">Отмена</button>
</div>
</form>


<?php

if (isset($_POST['but'])) {
    
    $datecreated =  date("Y-m-d");
    include "connect.php";
    $login = $_POST['login'];
    $access = $_POST['access'];
    $displayname = $_POST['displayname'];
    $passwd = $_POST['passwd'];
    $passwd2 = $_POST['passwd2'];

    if ($access=="Пользователь")
        {$access=1;}
    if ($access=="Администратор")
        {$access=2;}

    if ($passwd<>$passwd2)
    {
        echo "<script>alert('Введенные пароли не совпадают')</script>";
    }
    else
    {
    $pwd = password_hash($passwd,PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user` (`id`, `name`, `passwd`, `role`, `displayname`, `date_of_creation`) VALUES (NULL, '$login', '$pwd', '$access', '$displayname', '$datecreated');";
    if (mysqli_query($mysqli, $sql)) {
        echo "Запись добавлена:)";
  } else {
        echo "Запись не добавлена:(";
  }
}}
?>

</body>
</html>
<?php
}
else{
    header("Location: no_access.php");
}
