<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {

    if ($_POST['action'] == 'excluir' && isset($_POST['comentario_id'])) {
        $comentario_id = mysqli_real_escape_string($conn, $_POST['comentario_id']);


        $sql = "DELETE FROM `comentarios` WHERE id = '$comentario_id'";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            echo "Comentário excluído com sucesso";

        } else {
            echo "Erro ao excluir o comentário";
            echo mysqli_error($conn);
        }
    } elseif ($_POST['action'] == 'inserir') { 

    } else {
        echo "Ação inválida";
    }
} else {
    echo "Acesso inválido";
}
?>
