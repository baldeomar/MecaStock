<?php
    session_start();
    require_once ("/var/www/MecaStock/classes/User.php");

    if(isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['role'])
        && !empty($_SESSION['login']) && !empty($_SESSION['password']) && !empty($_SESSION['role'])){
        include_once("include/inc_home_list.php");
    }else if(!isset($_POST['login']) || !isset($_POST['password'])
        || is_null($_POST['login']) || is_null($_POST['password'])
        || empty($_POST['login']) || empty($_POST['password'])){
        header('Location: login.php?error');
        exit();
    }else{
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = new User();
        $user->loadUserByLogin($login);
        if(is_null($user->id) || empty($user->id) || !password_verify($password, $user->password)){
            header('Location: login.php?error');
            exit();
        }
        $_SESSION['login'] = $user->login;
        $_SESSION['password'] = $user->password;
        $_SESSION['role'] = $user->role;
        include_once("include/inc_home_list.php");
    }
