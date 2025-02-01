<?php
 session_start();
if(isset($_POST['submit']) && $_POST['email'] && $_POST['password']){


    include_once('config.php');
    $email = $_POST['email'];
    $pass = $_POST['password'];


$sql = "SELECT * FROM tbl_usuario  WHERE EMAIL =  '$email' and  SENHA = '$pass'";

    $result =   $conexao->query($sql);

    if(mysqli_num_rows($result) < 1){

        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: login.php');
    }else{

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        header('Location: ../home.php');
    }


}else{
 
    header('Location: login.php');
}











?>