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



            <?php require_once 'coments.php'; ?>
            <?php require_once 'deletarComentario.php'; ?>
    
    </div>
</body>

</html>