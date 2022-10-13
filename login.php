<?php
    $login = $_POST["login"];
    $password = $_POST["password"];
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'site_contas');

    $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE login = '$login' AND senha = '$password'");
    if(mysqli_num_rows($verifica) <= 0)
    {
        echo "<script language='javascript' type='text/javascript'> alert('Login ou senha incorretos');window.location.href='index.html';</script>";
        die();
    }
    else
    {
        setcookie("login", $login);
        header("Location:home.html");
    }
?> 