<?php
include('../login/config.php');
session_start();
// Obter o email da sessão
$email = $_SESSION['email'];

// Consulta para buscar o nome do usuário
$sql_nome_user = "SELECT NOME_USER FROM tbl_usuario WHERE EMAIL = ?";
$stmt_nome_user = $conexao->prepare($sql_nome_user);

if (!$stmt_nome_user) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

// Bind e execução da consulta
$stmt_nome_user->bind_param("s", $email);
$stmt_nome_user->execute();
$stmt_nome_user->bind_result($nome_user);
$stmt_nome_user->fetch();
$stmt_nome_user->close();

// Consulta para buscar o ID_USER
$sql_id_user = "SELECT ID_USER FROM tbl_usuario WHERE EMAIL = ?";
$stmt_id_user = $conexao->prepare($sql_id_user);

if (!$stmt_id_user) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt_id_user->bind_param("s", $email);
$stmt_id_user->execute();
$stmt_id_user->bind_result($id_user);
$stmt_id_user->fetch();
$stmt_id_user->close();

// Consulta para buscar os relatos do usuário
$sql_relatos = "SELECT RELATO, NOME_RELATO, DATA_POSTAGEM FROM tbl_relatos WHERE ID_USER = ?";
$stmt_relatos = $conexao->prepare($sql_relatos);

if (!$stmt_relatos) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt_relatos->bind_param("i", $id_user);
$stmt_relatos->execute();
$result_relatos = $stmt_relatos->get_result();


if ($result_relatos->num_rows > 0) {
    while ($row = $result_relatos->fetch_assoc()) {
        echo "<div class='cardRelato'>";
        echo "<div class='superiorCard'>";
        echo "<h2 class='nomeCard'>" . htmlspecialchars($row['NOME_RELATO']) . "</h2>";
        echo "<h3 class='dataCard'>" . htmlspecialchars($row['DATA_POSTAGEM']) . "</h3>";
        echo "</div>";
        echo "<div class='textCard'>";
        echo "<p class='relato'>" . htmlspecialchars($row['RELATO']) . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='error'>Nenhum relato encontrado para este usuário.</p>";
}
$stmt_relatos->close();


?>