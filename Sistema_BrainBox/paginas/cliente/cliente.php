<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cliente</title>
        <link href="css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <style type="text/css">
            body{
                font-family: 'Rubik', sans-serif;
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['cliente'])) {
             $usuario = $_SESSION['cliente']; 
             $email=$_SESSION['email'];
             $senha=$_SESSION['senha'];
             echo 'Nome: '.$usuario.'<br>';
             echo 'Email: '.$email.'<br>';
             echo 'Senha Criptografada: '.$senha.'<br>';   
        } else {
            header("location:entrar.php");
            exit();
        }
        ?>
    <center><h1>Bem vindo a tela do Cliente</h1></center>
    <a href="sair.php"> Sair </a> <br>
    <a href="../home.php"> Ver Cardápio </a>
</body
</html>
