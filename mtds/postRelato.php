<?php
    include('../login/config.php');
session_start();
$email = $_SESSION['email'];

$email_escapado = mysqli_real_escape_string($conexao, $email);

// Montar e executar a consulta
$query = "SELECT ID_USER FROM tbl_usuario WHERE email = '$email_escapado'";
$result = mysqli_query($conexao, $query);

// Armazenar o ID_USER diretamente em uma variável
$id_user = null; // Valor padrão caso nenhum usuário seja encontrado

if ($result) {
  if ($row = mysqli_fetch_assoc($result)) {
    $id_user = $row['ID_USER']; // Atribui o ID_USER retornado
  }
}



if (isset($_POST['submit'])) {


    $data_hoje = date('Y/m/d');
    $relato = $_POST['Relato'];
    $NomeRelato = $_POST['nomeRelato'];
  
    $result = mysqli_query($conexao, "INSERT INTO tbl_relatos(RELATO,NOME_RELATO,DATA_POSTAGEM,ID_USER) 
    VALUES('$relato','$NomeRelato', '$data_hoje', '$id_user')");
    header('Location: ../relatos.php');
  }
  



?>