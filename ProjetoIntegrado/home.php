<?php

include ('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container">
        <div class="inf-container">
                <center>
                <h1>Music Rating</h1>
                </center>
                    <p>Bem-vindo à nossa plataforma de avaliação musical, onde as batidas ecoam e as melodias nos
                        envolvem em um mundo de sensações.<br>
                        Aqui, mergulhamos em diferentes gêneros, artistas e álbuns, desvendando os segredos por trás de
                        cada acorde e letra. <br>
                        Seja você um entusiasta ávido por descobertas musicais ou alguém em busca de novos horizontes
                        sonoros, este é o seu lugar para explorar, descobrir e compartilhar sua paixão pela música.<br>
                        Então, ajuste seus fones de ouvido, aumente o volume e embarque conosco nessa jornada de
                        descoberta musical.</p>
                    <br>
                    <center><a href="avaliacao.php" class="white-btn">Explore as avaliações!</a></center>               
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>