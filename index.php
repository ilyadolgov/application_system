<html>
    <head>
        <title>Система заявок пользователей</title>
        <link rel="stylesheet" href="styles/style.css">
        <script src="js/script.js"></script>
</head>
<body>
<?php
require_once ('navigation.php');
?>
<div class='bodycontent'>
<h1>Система управления заявками в IT отдел</h1>


<?php
if(!$_SESSION['username']){
?>  <p>Для создания заявки в IT отдел, необходимо пройти авторизацию пользователя</p>
    <button type="submit" onclick="document.getElementById('id01').style.display='block'">Авторизация</button>
<?php
}
?>
</div>


</body>
</html>