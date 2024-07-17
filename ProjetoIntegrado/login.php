<?php
include 'config.php';

if(isset($_POST['email']) || isset($_POST['password'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['password']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email']);
        $senha = md5($conn->real_escape_string($_POST['password'])); 

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND password = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['name'] = $usuario['name'];
            $_SESSION['email'] = $usuario['email'];

            header("Location: home.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça Login!</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="Digite o seu email" required class="box">
            <input type="password" name="password" placeholder="Digite o sua senha" required class="box">
            <input type="submit" name="submit" value="Avançar" class="blue-btn">
            <p>Cliente novo? <a href="register.php">Cadastre-se!</a></p>
        </form>
    </div>
</body>

</html>