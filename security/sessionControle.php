<?php
    session_start();
    if(!isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['role'])
        || empty($_SESSION['login']) || empty($_SESSION['password']) || empty($_SESSION['role'])){
        header('Location: login.php?session_timeout');
        exit();
    }