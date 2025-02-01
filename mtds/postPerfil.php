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



// Verificando se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem'])) {
    // Conexão com o banco de dados (supondo que a variável $conexao já esteja configurada)
    
    // Caminho do diretório de destino
    $diretorio = './imgUser/';

    // Pegando informações da imagem
    $imagem_tmp = $_FILES['imagem']['tmp_name'];
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_extensao = pathinfo($imagem_nome, PATHINFO_EXTENSION);
    
    // Gerando um novo nome para a imagem
    $novo_nome = uniqid('user_', true) . '.' . $imagem_extensao;

    // Caminho completo onde a imagem será salva
    $caminho_destino = $diretorio . $novo_nome;

    // Movendo a imagem para o diretório desejado
    if (move_uploaded_file($imagem_tmp, $caminho_destino)) {
        // Imagem carregada com sucesso, agora vamos armazenar o caminho no banco de dados
       

        // Preparando a consulta SQL para atualizar o caminho da imagem
        $sql = "UPDATE tbl_usuario SET FOTO_USER = ? WHERE id_user = ?";

        // Preparando a declaração
        $stmt = $conexao->prepare($sql);
        if ($stmt === false) {
            die("Erro ao preparar a declaração: " . $conexao->error);
        }

        // Bind dos parâmetros
        $stmt->bind_param("si", $caminho_destino, $id_user);

        // Executando a consulta
        if ($stmt->execute()) {
            echo "Imagem carregada e caminho atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o caminho da imagem: " . $stmt->error;
        }

        // Fechando a declaração
        $stmt->close();
    } else {
        echo "Erro ao carregar a imagem.";
    }
} else {
    echo "Nenhuma imagem foi enviada.";
}
?>
