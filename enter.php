<?php
    session_start();
    $name=$_POST['uname'];
    $passwd=$_POST['psw'];
    require_once ('connect.php');
    $query = "SELECT * FROM `user` WHERE `name`='$name'";
    $result = $mysqli->query($query);
    $row = mysqli_fetch_array($result);
    if (password_verify($passwd,$row['passwd'])) {

//Скрипт проверки роли админа
$query = "SELECT role.role FROM user INNER JOIN role ON user.id = role.name WHERE (((user.name)='$name'));";
$result = $mysqli->query($query);
while ($row=mysqli_fetch_array($result)) {
    $userrole = $row['role'];
} 
//Скрипт проверки роли админа

        $_SESSION['username'] = $name;
        $_SESSION['user_role'] = $userrole;
        header("Location: index.php");
    }
    else {
        echo "Неправильный логин или пароль!";
    }
?>