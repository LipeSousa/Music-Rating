<?php 
include 'config.php';

if(isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass' ") or die('A consulta falhou!');

    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'O usuario já existe!';
    }else{
       if($pass != $cpass){
        $message[] = 'A senha não corresponde com a confirmação de senha!';
       }else{
        mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES ('$name', '$email', '$cpass')") or die ('A consulta falhou!');
        $message[] = 'Registrado com sucesso!';
        header('location:login.php');
       }
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Registre</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h2>Se registre</h2>
            <input type="text" name="name" placeholder="Digite o seu nome" required class="box">
            <input type="email" name="email" placeholder="Digite o seu email" required class="box">
            <input type="password" name="password" placeholder="Digite o sua senha" required class="box">
            <input type="password" name="cpassword" placeholder="Confirme sua senha" required class="box">
            <input type="submit" name="submit" value="Avançar" class="blue-btn">
            <p>Você ja possui uma conta? <a href="login.php">Faça Login!</a></p>
        </form>
    </div>
</body>
</html>