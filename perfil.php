<?php
include('./login/config.php');
session_start();

// Verificar se a sessão está ativa
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
  unset($_SESSION['email'], $_SESSION['password']);
  header('Location: ./login/login.php');
  exit();
}
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
$sql_relatos = "SELECT ID_RELATO, RELATO, NOME_RELATO, DATA_POSTAGEM FROM tbl_relatos WHERE ID_USER = ?";
$stmt_relatos = $conexao->prepare($sql_relatos);

if (!$stmt_relatos) {
  die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt_relatos->bind_param("i", $id_user);
$stmt_relatos->execute();
$result_relatos = $stmt_relatos->get_result();

// Verificar se o botão de "Apagar Conta" foi clicado
if (isset($_POST['apagarConta'])) {
  excluirConta($id_user, $conexao);
}

function excluirConta($id_user, $conexao)
{
  // Iniciar a transação para garantir que tudo seja feito corretamente
  $conexao->begin_transaction();

  try {
    // Excluir os relatos do usuário
    $sql_delete_relatos = "DELETE FROM tbl_relatos WHERE ID_USER = ?";
    $stmt_delete_relatos = $conexao->prepare($sql_delete_relatos);
    if (!$stmt_delete_relatos) {
      throw new Exception("Erro ao preparar a consulta para excluir relatos: " . $conexao->error);
    }
    $stmt_delete_relatos->bind_param("i", $id_user);
    $stmt_delete_relatos->execute();
    $stmt_delete_relatos->close();

    // Excluir o usuário da tabela
    $sql_delete_user = "DELETE FROM tbl_usuario WHERE ID_USER = ?";
    $stmt_delete_user = $conexao->prepare($sql_delete_user);
    if (!$stmt_delete_user) {
      throw new Exception("Erro ao preparar a consulta para excluir o usuário: " . $conexao->error);
    }
    $stmt_delete_user->bind_param("i", $id_user);
    $stmt_delete_user->execute();
    $stmt_delete_user->close();

    // Commit da transação
    $conexao->commit();

    // Encerrar a sessão após a exclusão
    session_destroy();

    // Redirecionar para a página de login
    header('Location: ./login/login.php');
    exit(); // Certifique-se de que o script pare aqui após o redirecionamento

  } catch (Exception $e) {
    // Se ocorrer algum erro, faz o rollback
    $conexao->rollback();
    die("Erro ao excluir a conta: " . $e->getMessage());
  }
}

if (isset($_POST['excluirRelato'])) {
  $relato_id = $_POST['relato_id'];
  excluirRelato($relato_id, $conexao);
}

function excluirRelato($relato_id, $conexao)
{
  // Prepare a consulta para excluir o relato
  $sql_delete_relato = "DELETE FROM tbl_relatos WHERE ID_RELATO = ?";
  $stmt_delete_relato = $conexao->prepare($sql_delete_relato);

  if (!$stmt_delete_relato) {
    die("Erro ao preparar a consulta para excluir relato: " . $conexao->error);
  }

  // Bind e execução
  $stmt_delete_relato->bind_param("i", $relato_id);
  $stmt_delete_relato->execute();

  // Fechar a consulta
  $stmt_delete_relato->close();

  // Redirecionar para a mesma página para atualizar a lista de relatos
  header('Location: ./perfil.php');
  exit();
}

if (isset($_POST['alterarDados'])) {
  $novo_nome = $_POST['nome_user'];
  $novo_email = $_POST['email_user'];
  $nova_senha = $_POST['senha_user'];

  // Atualizar nome e e-mail
  $sql_update = "UPDATE tbl_usuario SET NOME_USER = ?, EMAIL = ? WHERE ID_USER = ?";
  $stmt_update = $conexao->prepare($sql_update);
  if (!$stmt_update) {
    die("Erro ao preparar a consulta de atualização: " . $conexao->error);
  }
  $stmt_update->bind_param("ssi", $novo_nome, $novo_email, $id_user);
  $stmt_update->execute();

  // Atualizar a senha, se fornecida
  if (!empty($nova_senha)) {
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $sql_update_senha = "UPDATE tbl_usuario SET SENHA = ? WHERE ID_USER = ?";
    $stmt_update_senha = $conexao->prepare($sql_update_senha);
    if (!$stmt_update_senha) {
      die("Erro ao preparar a consulta de atualização da senha: " . $conexao->error);
    }
    $stmt_update_senha->bind_param("si", $nova_senha_hash, $id_user);
    $stmt_update_senha->execute();
  }

  // Fechar a conexão
  $stmt_update->close();
  if (isset($stmt_update_senha)) {
    $stmt_update_senha->close();
  }

  // Recarregar o nome do usuário atualizado
  $sql_nome_user = "SELECT NOME_USER FROM tbl_usuario WHERE ID_USER = ?";
  $stmt_nome_user = $conexao->prepare($sql_nome_user);
  if (!$stmt_nome_user) {
    die("Erro ao preparar a consulta de nome de usuário: " . $conexao->error);
  }
  $stmt_nome_user->bind_param("i", $id_user);
  $stmt_nome_user->execute();
  $stmt_nome_user->bind_result($nome_user);
  $stmt_nome_user->fetch();
  $stmt_nome_user->close();

  // Redirecionar após a atualização
  header('Location: ./perfil.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./imgs/geral/logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&family=Roboto+Slab:wght@100..900&display=swap"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/perfil.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="./css/relatos.css">

  <title>Perfil</title>
</head>

<body style="background-color: white;">
  <nav class="navbar fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="./home.php">
        <img src="./imgs/geral/logo.png" alt="Logo" width="30" height="24">
      </a>
      <div class="container-navbaritem">
        <a class='btnRel' href='relatos.php'>Relatos</a>
        <a href='./perfil.php'><img class='iconePerfil' src='./imgs/geral/iconePerfil.png' alt=''></a>
      </div>
    </div>
  </nav>

  <div class="perfil">
    <img src="imgs/dev/nicollas.jpg" alt="" class="foto-perfil">
    <br>
    <h2 class="text_perfil">
      <?php echo htmlspecialchars($nome_user); ?>
    </h2>
    <h5 class="text_perfil"><?php echo htmlspecialchars($email); ?></h5>

    <button class="btn-perfil" id="btnAlterarDados">Alterar Dados</button>

    <!-- Formulário para alterar os dados -->
    <div id="formAlterarDados" style="display: none;">
      <form action="./perfil.php" method="POST" class="form-container">
        <div class="form-group">
          <input type="text" placeholder="Nome:" id="nomeUser" name="nome_user" class="form-control" value="<?php echo htmlspecialchars($nome_user); ?>" required>
        </div>
        <div class="form-group">
          <input type="password" placeholder="Senha:" id="senhaUser" name="senha_user" class="form-control">
          <small class="form-text text-muted">Deixe em branco para não alterar a senha.</small>
        </div>

        <div class="form-buttons">
          <button type="submit" name="alterarDados" class="btn btn-primary">Salvar Alterações</button>
          <button type="button" id="cancelarAlteracao" class="btn btn-secondary">Cancelar</button>
        </div>
      </form>
    </div>
    <form action="./perfil.php" method="POST" onsubmit="return confirm('Tem certeza de que deseja excluir sua conta?');">
      <button type="submit" name="apagarConta" class="btn-perfil">Apagar Conta</button>
    </form>

    <a href='./login/deslogar.php'><button class="btn-perfil">SAIR</button></a>
  </div>

  <img src="imgs/home/banner.jpeg" alt="" class="bannerPerfil w-100 h-50">

  <div class="scroll-div">
    <div class="content">
      <?php
      if ($result_relatos->num_rows > 0) {
        while ($row = $result_relatos->fetch_assoc()) {
          $relato_id = htmlspecialchars($row['ID_RELATO']);
          echo "<div class='cardRelato' id='relato_$relato_id'>";
          echo "<div class='superiorCard'>";
          echo "<h2 class='nomeCard'>" . htmlspecialchars($row['NOME_RELATO']) . "</h2>";
          echo "<h5 class='dataCard'>" . htmlspecialchars($row['DATA_POSTAGEM']) . "</h3>";
          echo "<form method='POST' action='' style='position: absolute; top: 10px; right: 10px;'>";
          echo "<input type='hidden' name='relato_id' value='$relato_id'>";
          echo "<button type='submit' name='excluirRelato' class='deleteButton'>X</button>";
          echo "</form>";
          echo "</div>";
          echo "<div class='textCard'>";
          echo "<p class='relato'>" . htmlspecialchars($row['RELATO']) . "</p>";
          echo "</div>";
          echo "</div>";
        }
      }
      ?>


    </div>
  </div>

  <script src="./js/perfil.js"></script>

</body>

</html>