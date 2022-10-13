<?php
    $login = $_POST["login"];
    $password = $_POST["password"];
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'site_contas');
    $querySelect = "SELECT login FROM usuarios WHERE login = '$login'";
    $select = mysqli_query($connect, $querySelect);
    $resultArray = mysqli_fetch_array($select);
    $loginArray = $resultArray['login'];

    if($login == "" || $login == null)
    {
        echo "<script language='javascript' type='text/javascript'> alert('O campo login deve ser preenchido');window.location.href='index.html';</script>";
    }
    else
    {
        if($loginArray == $login)
        {
            echo "<script language='javascript' type='text/javascript'> alert('Esse login já existe');window.location.href='index.html';</script>";
        }
        else
        {
            $query = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$password')";
            $insert = mysqli_query($connect, $query);

            if(!$insert)
            {
                echo "<script language='javascript' type='text/javascript'> alert('Erro na criação desse usuário');window.location.href='index.html';</script>";
            }

            $query = "CREATE TABLE $login (id int unsigned zerofill not null auto_increment primary key, tipo varchar(50), data date, valor decimal(8,2))";
            $create = mysqli_query($connect, $query);

            if($create)
            {
                echo "<script language='javascript' type='text/javascript'> alert('Usuário cadastrado com sucesso!');window.location.href='index.html';</script>";
            }
            else
            {
                echo "<script language='javascript' type='text/javascript'> alert('Erro na criação desse usuário');window.location.href='index.html';</script>";
            }
        }
    }

    $connect = mysqli_close($connect);
?>