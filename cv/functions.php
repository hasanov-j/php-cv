<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('HOST', $_SERVER['HTTP_HOST']);
define('PROJECT_ROOT', '/cv');
define('AUTH_LOGIN', PROJECT_ROOT . '/auth/login');
define('error401', PROJECT_ROOT . '/error401.php');


function auth($username, $password)
{
    if (userDataCheck($username, $password)) {
        $_SESSION['password'] = $password;
        setcookie('username', $username, time() + 604800 * 30, PROJECT_ROOT);
        header("HTTP/1.1 302");
        header("Location: " . PROJECT_ROOT);
        exit();
    } else {
        header("Location: " . AUTH_LOGIN);
        exit();
    }
}


function authCheck()
{
    if (
        array_key_exists('password', $_SESSION) &&
        array_key_exists('username', $_COOKIE) &&
        userDataCheck($_COOKIE['username'], $_SESSION['password'])
    ) {
        return getUserdata($_COOKIE['username'], $_SESSION['password']);
    } else {
        header("Location: " . AUTH_LOGIN);
        exit();
    }
}

function userDataCheck($username, $password): bool
{
    //проверять если ли данные в нашей бд
    $users = json_decode(file_get_contents(ROOT . '/cv/auth/users.json'), true);

    foreach ($users as $user) {
        if ($username === $user['username'] && $password === $user['password']) {
            return true;
        }
    }
    return false;
}

function getUserData($username, $password): null|array
{
    //проверять если ли данные в нашей бд
    $users = json_decode(file_get_contents(ROOT . '/cv/auth/users.json'), true);

    foreach ($users as $user) {
        if ($username === $user['username'] && $password === $user['password']) {
            return $user;
        }
    }

    return null;
}

function isAuth()
{
    if( array_key_exists('password', $_SESSION) &&
        array_key_exists('username', $_COOKIE) &&
        userDataCheck($_COOKIE['username'], $_SESSION['password'])
    ){
        return true;
    }
    else{
        return false;
    }
}