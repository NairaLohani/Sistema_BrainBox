<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Dados Atuais</title>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        if (isset($_SESSION['administrador'])) {
            $usuario = $_SESSION['administrador'];
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];
            $id= $_SESSION['id_adm'] ;
        } else {
            header("location:entrar.php");
            exit();
        }
        ?>
        <div class="tablebox">
        <table border="1">
            <h1>Dados atuais<h1>
                <tr class="titles">
                <td>ID adm</td> 
                <td>Nome</td> 
                <td>E-mail</td>
                <td>Senha Criptografada</td>
                <td colspan="2">Opções</td>
            </tr>
            <tr>
                <td><?php echo $id;?></td> 
                <td><?php echo $usuario; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $senha; ?></td>
                <td><?php echo "<a href=edit_adm.php?editar=".$id. ">Editar</a>"; ?></td>
                <td><?php echo "<a href=delete_adm.php?deletar=".$id. ">Excluir</a>"; ?></td>
            </tr>
        </table>
    </div>
    </body>
</html>