<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body
    style="background-image: url('https://moewalls.com/wp-content/uploads/2023/08/jake-listens-to-music-alone-at-night-adventure-time-thumb.jpg'); background-size: cover;">
    <?php require_once 'protect.php'; ?>
    <?php
    $nomeCompleto = $_SESSION['name'];
    $partesNome = explode(' ', $nomeCompleto);
    $primeiroNome = $partesNome[0];
    ?>
    <?php require_once 'header.php'; ?><br><br><br><br>
    <main class="user-container">
        <div class="user">
            <div class="user-text">
                <p>Bem vindo(a), <strong>
                        <?php echo $primeiroNome; ?>!
                    </strong></p>
                <p><img src="img/email.png" width="20px" height="20px"><span>
                        <?php echo $_SESSION['email']; ?>
                    </span><a href="logout.php" class="logout" style="position: relative; top: -15px;"><img src="img/logout.png" width="25px" height="25px" title="Sair!"></a></p>
                    
                <br><br><br>
                <h4><span>DADOS BÁSICOS</span></h4><br>

                <p>Nome Completo: <strong><?php echo $_SESSION['name']; ?></strong></p>
                <p>E-mail: <strong><?php echo $_SESSION['email']; ?></strong></p>
                <p>Id: <strong><?php echo $_SESSION['id']; ?></strong></p>
                <br><br>
                <h4><span>ATUALIZAR DADOS</span></h4><br>
                <form action="atualizarUsuario.php" method="POST">
                    <label for="nome">Novo Nome Completo:</label>
                    <input type="text" id="nome" name="nome" required><br><br>

                    <label for="email">Novo E-mail:</label>
                    <input type="email" id="email" name="email" required style="width: 66%;"><br><br>

                    <label for="senha">Nova Senha:</label>
                    <input type="password" id="senha" name="senha" required style="width: 66.5%;"><br><br>
                    <p style="font-size: .9rem">Ao atualizar seus dados, você sera redirecionado para página de Login!</p><br>
                    <button type="submit" name="atualizar">Atualizar</button>
                </form>

            </div>
        </div>
        <aside>
            <form action="deletarUsuario.php" method="POST">
                <p>Ao excluir sua conta, você sera direcionado para página de registro!</p>
                <input placeholder="Digite seu id" type="text" id="id" name="id" required><br><br>
                <button type="submit" name="delete">Deletar</button><br><br><br><br>
            </form>
        </aside>
    </main>
</body>

</html>