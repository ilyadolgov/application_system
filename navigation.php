<!-- шапка сайта -->

<?php
session_start();
?>
<header>
<div class="navbar">
  <a href="index.php">Главная страница</a>
  <?php 
  if($_SESSION['user_role'] == 'user') {
    echo "<div class='dropdown'>
    <button class='dropbtn'> Заявки </button>
    <div class='dropdown-content'>
      <a href='new_application.php'>Новая заявка</a>
      <a href='open_applications.php'>Открытые заявки</a>
      <a href='completed_applications.php'>Закрытые заявки</a>
    </div>
  </div> ";
  }
  if($_SESSION['user_role'] == 'admin') {
    echo "<div class='dropdown'>
    <button class='dropbtn'> Заявки </button>
    <div class='dropdown-content'>
      <a href='new_application.php'>Не обработанные заявки</a>
      <a href='open_applications.php'>Закрытые заявки</a>
    </div>
  </div> ";
    echo "<div class='dropdown'>
    <button class='dropbtn'> Пользователи </button>
    <div class='dropdown-content'>
      <a href='new_application.php'>Создание нового пользователя</a>
      <a href='open_applications.php'>Смена пароля пользователя</a>
    </div>
  </div> ";
  }
  ?>

<!-- меню авторизации -->
<?php if(!$_SESSION['username']){
echo "<div class='float'>";
?>
<input type='submit' onclick="document.getElementById('id01').style.display='block'" class="but" value='Войти'>
<?php "
</div>";
}
else {
  $usernm = $_SESSION['username'];
  echo "<div class='float'>";
  ?>
  <welcome class='welc'>Добро пожаловать, <?php echo $usernm; ?> </welcome>
  <a href='logout.php'>Выйти</a>
  <?php "
  </div>";
  }
?>
<!-- меню авторизации -->

</div>
</header>

<!-- меню авторизации -->
<div id="id01" class="modal">
  <form class="modal-content animate" action="enter.php" method='POST'>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
      <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Логин</b></label>
      <input type="text" placeholder="Введите логин пользователя" name="uname" required>
      <label for="psw"><b>Пароль</b></label>
      <input type="password" placeholder="Введите пароль пользователя" name="psw" required>
      <button type="submit">Авторизация</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Отмена</button>
    </div>
  </form>
</div>

