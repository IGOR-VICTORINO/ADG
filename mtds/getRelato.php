<?php
include('./login/config.php');

$query = "SELECT DISTINCT RELATO, NOME_RELATO, DATA_POSTAGEM, ID_USER FROM tbl_relatos";


// Executar a consulta
$result = mysqli_query($conexao, $query);


if ($result) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='cardRelato'>";
        echo "<div class = 'superiorCard'";
        echo "<h1 class='nomeCard'>  </h1>";
        echo "<h2 class='nomeCard' style = 'font-size = '2em''> ". $row['NOME_RELATO'] ."</h1>";
        echo "<h3 class='dataCard'>" . $row['DATA_POSTAGEM'] . "</h1>";
        echo "</div>";
        echo "<div class = 'textCard'";
        echo "<p class='relato'>" . $row['RELATO'] . "</p>";
        echo "</div>";
        echo "</div>";
      }
    } else {
    }
  } else {
    echo "<p class='error'>Erro ao executar a consulta: " . mysqli_error($conexao) . "</p>";
  }

?>