<?php


include $_SERVER['DOCUMENT_ROOT'] . '/cv/functions.php';


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

<?php if(isAuth()):?>

    <form method="post" action="<?=AUTH_LOGOUT?>">
        <input id="logout" name="logout" type="submit" value="Выход">
    </form>
<?php endif;?>


    <h1>403 - У вас не достаточно прав</h1>




</body>
</html>