<?php
    session_start();

    if(array_key_exists('sdfgdrfgfxdg', $_POST) && array_key_exists('password', $_POST)){
        if($_POST['password'] == '1234'){
            $_SESSION['username'] = $_POST['sdfgdrfgfxdg'];
            $_SESSION['isAuth'] = true;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php if (array_key_exists('isAuth', $_SESSION) && $_SESSION['isAuth'] == true): ?>
<h1>Привет: <?php echo $_SESSION['username'] ?> </h1>
<?php else: ?>
    <h1>Я тебя не знаю введи данные: </h1>
    <form method="POST">
        <input type="text" placeholder="Логин" name="sdfgdrfgfxdg">
        <input type="text" placeholder="пароль" name="password">
        <input type="submit" value="отправить">
    </form>
<?php endif;?>

</body>
</html>
