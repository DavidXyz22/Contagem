<?php
    $contas = $_POST["contas"];
    $login = $_COOKIE['login'];
    
    switch ($contas){
        case "tdconta":
            $query = "SELECT data, tipo, valor FROM $login";
        break;
        case "ultconta":
            $query = "SELECT data, tipo, valor FROM $login WHERE id = (SELECT MAX(id) FROM $login)";
        break;
        case "maisconta":
            $query = "SELECT data, tipo, valor FROM $login WHERE valor = (SELECT MAX(valor) FROM $login)";
        break;
        case "menosconta":
            $query = "SELECT data, tipo, valor FROM $login WHERE valor = (SELECT MIN(valor) FROM $login)";
        break;
        case "mediaconta":
            $query = "SELECT AVG(valor) FROM $login";
        break;
    }

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'site_contas');
    $result = mysqli_query($connect, $query);

    if($result->num_rows > 0 && $contas != "mediaconta")
    {
        while($row = $result->fetch_assoc())
        {
            echo "Data: ". $row["data"]. " Tipo: ". $row["tipo"]. " Valor: " . $row["valor"] . "<br>";
        }
    }
    else if($contas == "mediaconta")
    {
        $row = $result->fetch_assoc();
        echo "Valor médio: ". $row['AVG(valor)'];
    }
    else
    {
        echo "0 resultados";
    }
    $connect = mysqli_close($connect);
?>