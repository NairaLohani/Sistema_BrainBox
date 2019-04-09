<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Redefinir Dados</title>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/conexao.php';
        $sql = 'SELECT * FROM usuarios WHERE id_usuario=' . $_GET['editar'];
        $result = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_array($result);
        ?>
            
            <div class="loginbox">
                <h1>Redefina seus dados</h1>
                <form method="post" action="evento_adm.php?editar=<?php echo $linha['id_usuario']; ?>">
                    <input type="text" name="nome" required="" value="<?php echo $linha['nome_usuario']; ?>">
                <input type="email" name="email"  required="" value="<?php echo $linha['email_usuario']; ?>">
                <input type="password" name="senha"  required="" placeholder="Digite senha">
                <input type="password" name="conf_senha" required=""  placeholder="Confirme sua senha">
                <input type="submit" value="Enviar">
            </form>
            </div>
        <br>
    </body>
</html>
