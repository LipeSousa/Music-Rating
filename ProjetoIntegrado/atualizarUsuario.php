<?php require_once "protect.php"; ?>
<?php require_once "config.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $novoNome = $_POST['nome'];
    $novoEmail = $_POST['email'];
    $novaSenha = md5($_POST['senha']); 

   
    $sql = "UPDATE users SET name = '$novoNome', email = '$novoEmail', password = '$novaSenha' WHERE id = " . $_SESSION['id'];

    if ($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso!";
        header("location: Login.php");
        session_destroy();
        exit();
    } else {
        echo "Erro ao atualizar dados: " . $conn->error;
    }
}
?>
