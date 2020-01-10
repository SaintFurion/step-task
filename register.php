<?php
  include 'init.php';

  session_start();

  if (empty($_SESSION['auth'])) {
    if ($_POST['password'] == $_POST['confirm']) {
      $login = $_POST['login'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $data = $_POST['data'];
      $email = $_POST['email'];
      $registration_date = date('Y-m-d');

      $query = "SELECT * FROM users WHERE login='$login'";
      $user = mysqli_fetch_assoc(mysqli_query($link, $query));

      if (empty($user)) {
        $query = "INSERT INTO users SET login='$login', password='$password', data='$data', email='$email', registration_date='$registration_date'";
        mysqli_query($link, $query);

        $id = mysqli_insert_id($link);
        $_SESSION['id'] = $id;
      } else {
        echo "login занят";
      }
    } else {
      echo "Пароль и подтверждение не совпадают";
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
            <h2>Форма регистрации</h2>
              <form action="" method="post">
                <?php if ($str) echo $string ?><br>
                <input type="text" name="login" placeholder="Login"><br>
                <?php if ($strl) echo $string ?><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="password" name="confirm" placeholder="Confirm password"><br>
                <input type="date" name="data" placeholder="Date of Birth"><br>
                <input type="text" name="email" placeholder="Email"><br>
                <input type="submit" name="submit" value="Зарегистрироваться">
              </form>
          </div>
        </div>
      </header>
  	</body>
  </html>
