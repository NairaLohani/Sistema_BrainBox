<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Gerentes Cadastrados</title>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/conexao.php';
        $nivel = 3;
        $consulta = mysqli_query($conn, "select * from usuarios where nivel_usuario ='$nivel'");
        $resultado = mysqli_num_rows($consulta);
        if($resultado>0){
        ?>
        <div class="tablebox">
            <table border="1">
                <tr class="titles">
                    <td>ID</td> 
                    <td >Nome</td> 
                    <td >E-mail</td> 
                    <td >Senha Criptografada</td> 
                    <td colspan="2">Opção</td>
                </tr>
                <?php while ($retorna = mysqli_fetch_array($consulta)) { ?>
                    <tr>
                        <td><?php echo $retorna['id_usuario'], "&nbsp"; ?></td>
                        <td><?php echo $retorna['nome_usuario']; ?></td>
                        <td><?php echo $retorna['email_usuario']; ?></td>
                        <td><?php echo $retorna['senha_usuario']; ?></td>
                        <td><?php echo "<a href=delete_ge.php?deletar_gerente=".$retorna['id_usuario']. ">Excluir</a>"; ?></td>
                    </tr>
                    <?php
                }
        } else {
            ?>
                ?>
        <div class="msg">Nenhum gerente cadastrado no momento.</div>
        <?php
        }
        ?>
            </table>
        </div>
    </body>
</html>
