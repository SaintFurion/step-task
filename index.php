<?php
  session_start();
?>
  <!DOCTYPE html>
  <html>
  	<head>
      <title>Тестовое задание</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style.css">
  	</head>
  	<body>
      <header>
        <div class="container">
          <div class="clearfix">
            <h1 class="promo"><a href="index.php">Тестовое задание</a></h1>
            <?php
              if (!empty($_SESSION['auth'])) {
                $login = $_SESSION['login'];
                echo "<p class='auth'> Вы зашли как $login <br>";
                echo '<a href="logout.php">Выйти</a></p>';
              }
              if (empty($_SESSION['auth'])) {
                echo '<p class="auth"><a href="login.php">Войти</a> или ';
                echo '<a href="register.php">Зарегистрироваться</a></p>';
              }
            ?>
          </div>
          <div class="link">
            <a href="users.php">Зарегистрированные пользователи</a>
          </div>
        </div>
      </header>
  	</body>
  </html>
