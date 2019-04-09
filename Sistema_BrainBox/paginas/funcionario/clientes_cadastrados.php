<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Funcionário -  Clientes Cadastrados</title>
    </head>
    <body>
        <?php
        include_once './funcionario.php';
        include_once '../../classes/conexao.php';
        $nivel = 1;
        $consulta = "select * from usuarios where nivel_usuario ='$nivel'";
        $resultado = mysqli_query($conn, $consulta);
        ?>
        <div class="tablebox">
            <table border="1">
                <tr class="titles">
                    <td>ID cliente</td> 
                    <td >Nome</td> 
                    <td >E-mail</td> 
                    <td >Senha Criptografada</td> 
                </tr>
                <?php while ($retorna = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $retorna['id_usuario'], "&nbsp"; ?></td>
                        <td><?php echo $retorna['nome_usuario']; ?></td>
                        <td><?php echo $retorna['email_usuario']; ?></td>
                        <td><?php echo $retorna['senha_usuario']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>
