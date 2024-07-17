<?php include ('protect.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            height: 200vh;
            background-position: initial;
            background-color: rgb(3, 20, 10);
        }

        header {
            position: fixed;
            width: 100%;
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <?php

    include('config.php');

    function formatarDataHora($dataHora)
    {
        $dataHoraObj = new DateTime($dataHora);
        $dataFormatada = $dataHoraObj->format('d/m/Y');
        $horaFormatada = $dataHoraObj->format('H:i');
        return $dataFormatada . ' às ' . $horaFormatada;
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] == 'inserir') {

            if (isset($_POST['comentario'], $_POST['music'])) {
                $comentario = mysqli_real_escape_string($conn, $_POST['comentario']);
                $music = mysqli_real_escape_string($conn, $_POST['music']);
                $autor = $_SESSION['name'];


                $sql = "INSERT INTO `comentarios` (autor, music ,comentario) VALUES ('$autor','$music','$comentario')";
                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    echo "Comentário adicionado com sucesso";

                    header('Location: avaliacao.php');
                    exit();
                } else {
                    echo "Erro ao adicionar o comentário";
                    echo mysqli_error($conn);
                }
            } else {
                echo "Por favor, preencha todos os campos";
            }
        } elseif ($_POST['action'] == 'excluir') {

            if (isset($_POST['comentario_id'])) {
                $comentario_id = mysqli_real_escape_string($conn, $_POST['comentario_id']);

                $sql = "DELETE FROM `comentarios` WHERE id = '$comentario_id'";
                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    echo "Comentário excluído com sucesso";
                } else {
                    echo "Erro ao excluir o comentário";
                    echo mysqli_error($conn);
                }
            } else {
                echo "ID do comentário não foi enviado";
            }
        }
    }

    echo '
    <div class="ava-container">
        <br><br>
        <center>
            <h1>Avaliações Musicais</h1>
        </center>

        <!-- Formulário de seleção para o filtro -->
        <form method="GET" style="color: white; text-align: end; position: relative; top: 27px;">
            <label for="ordenar" style="font-size: 1.5rem;">Ordenar por: </label>
            <select name="ordenar" id="ordenar" style="color: #fff; background-color: transparent; border: 1px solid #fff; border-radius: .5rem;">
                <option value="recentes" style="color: #222;">Mais recentes</option>
                <option value="antigos" style="color: #222;">Mais antigos</option>
            </select>
            <input type="submit" value="Filtrar" class="blue-btn">
        </form>

        <form method="POST" style="color: white;">
            <p>Música:</p>
            <textarea type="text" name="music" class="area-music" placeholder="Ex: Post Malone - Stay"></textarea>
            <p>Comentário:</p>
            <textarea type="text" name="comentario" class="area-comentario"></textarea>
            <input type="hidden" name="action" value="inserir"> <!-- Adicionando campo oculto para indicar a ação -->
            <input type="submit" name="btn" value="Enviar" class="blue-btn">
        </form>';

    $ordenar = isset($_GET['ordenar']) ? $_GET['ordenar'] : 'recentes';

    $ordem_sql = ($ordenar == 'recentes') ? "DESC" : "ASC";
    $sql2 = "SELECT * FROM `comentarios` ORDER BY datahora $ordem_sql";
    $res = mysqli_query($conn, $sql2);

    while ($linha = mysqli_fetch_assoc($res)) {
        echo "
        <div class='coment-box'><br>
            <div class='comentario'>
                <strong>{$linha['autor']} - Música: {$linha['music']}</strong><br><br>";
        if ($_SESSION['name'] == $linha['autor']) {
            echo "
                <form action='avaliacao.php' method='post'>
                    <input type='hidden' name='action' value='excluir'>
                    <input type='hidden' name='comentario_id' value='{$linha['id']}'>
                    <input type='submit' value='Excluir Comentário' class='excluir-btn'>
                </form>";
        }

        echo "
                {$linha['comentario']}
                <div class='data'>" . formatarDataHora($linha['datahora']) . "</div>
            </div>
        </div>
        ";
    }
    ?>
</div>
