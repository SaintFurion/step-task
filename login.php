<?php
  include 'init.php';

  session_start();

  $right = false;
  $form = '<form action="" method="POST">
      <input type="text" name="login" placeholder="Login"><br>
      <input type="password" name="password" placeholder="Password"><br>
      <input type="submit" name="submit" value="Авторизоваться"><br>
    </form>';
  if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];

    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);
    if (!empty($user)) {
      $hash = $user['password'];

      if (password_verify($_POST['password'], $hash)) {
          $_SESSION['auth'] = true;
          $_SESSION['login'] = $login;
          $_SESSION['status'] = $user['status'];
          $_SESSION['id'] = $user['id'];
          header('Location: /index.php'); die();
      } else {
        $right = true;
      }
    } else {
      $right = true;
    }
  }
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
            <a href="index.php"><h1 class="promo">Тестовое задание</h1></a>
          </div>
          <div class="form">
            <h2>Форма входа</h2>
              <?php
                echo $form;
                if ($right == true) { echo "Вы ввели неправильный логин или пароль"; }
              ?>
          </div>
        </div>
      </header>
  	</body>
  </html>
