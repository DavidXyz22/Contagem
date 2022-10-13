<?php
    $login = $_COOKIE['login'];
    $tipo = $_POST["tipo"];
    $data = $_POST["data"];
    $valor = $_POST["valor"];
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'site_contas');
    $query = "INSERT INTO $login (tipo, data, valor) VALUES('$tipo', '$data', '$valor')";
    $insert = mysqli_query($connect, $query);
    $connect = mysqli_close($connect);
    if($insert)
    {
        echo "<script language='javascript' type='text/javascript'> alert('Informações enviadas com sucesso!');window.location.href='informar.html';</script>";
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'> alert('Falha no envio das informações enviadas');window.location.href='informar.html';</script>";
    }
?>