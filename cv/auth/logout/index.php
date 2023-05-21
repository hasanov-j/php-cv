<?php


include $_SERVER['DOCUMENT_ROOT'] . '/cv/functions.php';

session_unset();
setcookie('username','',time()-80000,PROJECT_ROOT);
header('HTTP/1.1 302');
header(sprintf('location: %s', AUTH_LOGIN));
//удалять сессии и куки
//редирект на предведущую страницы
?>