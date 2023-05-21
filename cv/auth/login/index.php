<?php
//$data_users=[
//    [
//        'username'=>"Jafar",
//        'password'=>"Helloworld101!",
//        'avatar'=>"auth/Jafar.jpg",
//        'role'=>"admin"
//    ],
//    [
//        'username'=>"Ahmed",
//        'password'=>"Helloworld",
//        'avatar'=>"auth/Ahmed.jpg",
//        'role'=>"user"
//    ],
//
//    [
//        'username'=>"Aynur",
//        'password'=>"Hello",
//        'avatar'=>"auth/Aynur.jpg",
//        'role'=>"user"
//    ],
//
//];
//
//$str_data_users=json_encode($data_users);
//file_put_contents('../users.json',$str_data_users);

include $_SERVER['DOCUMENT_ROOT'] . '/cv/functions.php';

if(!empty($_POST)){
    auth($_POST['username'],$_POST['password']);
}

if(isAuth()){
    header("Location: " . PROJECT_ROOT);
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="<?= PROJECT_ROOT ?>/cv.css"></link>
</head>
<body>


<form method="post" >

    <div class="form-group">
        <label for="username">username</label>
        <input name="username" type="text" class="form-control" id="username"  placeholder="Введите имя ползователя">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>