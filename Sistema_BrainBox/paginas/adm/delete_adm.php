<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Deletar Conta</title>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        if (isset($_SESSION['administrador'])) {
            $usuario = $_SESSION['administrador'];
            $id= $_SESSION['id_adm'] ;
        } else {
            header("location:entrar.php");
            exit();
        }
        ?>
        <div id="popup_erro">
            <img src="../../img/warning.png"><br>
            Tem certeza que deseja<br> apagar sua conta?<br>
            <a href="../eventos/evento_adm.php">
                 <button><?php echo "<a href=evento_adm.php?deletar=".$id.">Sim</a>"; ?></button>
            <a href="news_cadastros.php">
                <button>Não</button>
            </a>
        </div>
    </body>
</html>
