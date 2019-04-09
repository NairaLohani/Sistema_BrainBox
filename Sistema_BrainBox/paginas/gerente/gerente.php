<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerente</title>
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
        if (isset($_SESSION['gerente'])) {
            
        } else {
            header("location:entrar.php");
            exit();
        }
        ?>
    <center><h1>Bem vindo a área do gerente</h1></center>
    <a href="sair.php"> Sair </a> <br>   
</body>
</html>
