<?php
  include 'init.php';

  $query = "SELECT * FROM users";
  $result = mysqli_query($link, $query);
  for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

  function delete($link) {
    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      $query = "DELETE FROM users WHERE id=$id";
      mysqli_query($link, $query) or die(mysqli_error($link));

      header('Location: /index.php'); die();
    }
  }

  delete($link);

  foreach ($data as $elem) {
    $res .= '<tr>';
    $res .= '<td>' . $elem['login'] . '</td>';
    $res .= "<td><a href=\"?delete={$elem['id']}\">delete</a></td>";
    $res .= '</tr>';
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
            <h2>Зарегистрированные пользователи</h2>
            <table><tr><th>Логин</th><th>Удалить пользователя</th></tr>
              <?php echo $res; ?>
            </table>
          </div>
        </div>
      </header>
  	</body>
  </html>
