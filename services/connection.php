<?php
$db_host = 'localhost';
$db_user = 'blog_user';
$db_password = 'alura';
$db_db = 'blog';
$db_port = 8889;

$mysql = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);

$mysql->set_charset('utf8');

if ($mysql->connect_error) {
  echo 'Errno: '.$mysql->connect_errno;
  echo '<br>';
  echo 'Error: '.$mysql->connect_error;
  exit();
}

// echo 'Success: A proper connection to MySQL was made.';
// echo '<br>';
// echo 'Host information: '.$mysql->host_info;
// echo '<br>';
// echo 'Protocol version: '.$mysql->protocol_version;
?>