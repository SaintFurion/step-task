<?php
  $host = '127.0.0.1';
  $user = 'root';
  $password = '';
  $dbName = 'test1';

  $link = mysqli_connect($host, $user, $password, $dbName);
  mysqli_query($link, "SET NAMES 'utf8'");
