<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('HOST', $_SERVER['HTTP_HOST']);
define('PROJECT_ROOT', '/cv');
define('AUTH_LOGIN', PROJECT_ROOT . '/auth/login');
define('error401', PROJECT_ROOT . '/error401.php');
define('error403', PROJECT_ROOT . '/error403.php');
define('AUTH_LOGOUT', PROJECT_ROOT . '/auth/logout/index.php');
define('EDIT_CV', PROJECT_ROOT . '/edit.php');

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
function isAdmin($username, $password): bool
{
    $user=getUserData($username, $password);
    if($user!=null && $user['role']==='admin')
    {
        return true;

    }

    else return false;
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
        array_key_exists('username', $_COOKIE)
    ){
        return true;
    }
    else{
        return false;
    }
}

function getAuthUser()
{
    if(isAuth() && userDataCheck($_COOKIE['username'], $_SESSION['password'])){
        return  getUserData($_COOKIE['username'], $_SESSION['password']);
    }else{
        return null;
    }
}




/**
 * @param $role
 * @param $contentName - Раздел сайта из конфигов $accessSettings
 * @return bool
 */
function accessChecker($contentName)
{
    authCheck();

    $accessSettings = [
        'avatar' => [
            'admin',
            'user',
        ],
        'fio' => [
            'admin',
            'user'
        ],
        'editCv'=>[
            'admin',
        ]
    ];

    return in_array(getAuthUser()['role'], $accessSettings[$contentName]);
}