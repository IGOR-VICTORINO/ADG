<?php
if (isset($_POST['submit'])) {

    include_once('config.php');

    $userName = $_POST['nameUser'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($conexao, "INSERT INTO tbl_usuario(NOME_USER,EMAIL,SENHA) 
    VALUES('$userName', '$email', '$pass')");
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/geral/logo.png">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <a class="seta" href="../home.php"><img class="voltar" src="../imgs/imgsLogin/esquerda.png" alt=""></a>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="Post">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" name="nameUser" placeholder="Name" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <button name="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="testLogin.php" method="POST">
                <h1>Sign in</h1>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <a class="loginLink" href="#">Forgot your password?</a>
                <button name="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>






    <script src="../js/login.js"></script>


</body>

</html>