<?php require_once "config.php"; ?>
<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Verifica se o botão de deletar foi clicado
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM users WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "Usuário deletado com sucesso.";
            header("location: register.php");
        } else {
            echo "Erro ao deletar usuário: " . mysqli_error($conn);
        }
    }

    // Verifica se o botão de atualizar foi clicado
    if (isset($_POST['update'])) {
        // Adicione aqui o código para atualizar os dados do usuário
        echo "Atualizar usuário...";
    }
}

// Fechando a conexão com o banco de dados
mysqli_close($conn);
?>