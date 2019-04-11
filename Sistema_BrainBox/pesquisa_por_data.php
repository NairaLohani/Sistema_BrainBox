<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado da Pesquisa</title>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/conexao.php';
        $buscar = $_POST['buscar'];
        $sql = mysqli_query($conn,"SELECT * FROM usuarios WHERE date_cadastro LIKE '%" . $buscar . "%' AND nivel_usuario=1");
        $row = mysqli_num_rows($sql);
        if($row>0){
        ?>
        <div class="tablebox">
             <h1>Resultado da pesquisa</h1>
            <table border="1">
                <tr class="titles">
                    <td>ID cliente</td> 
                    <td >Nome</td> 
                    <td >E-mail</td> 
                    <td >Senha Criptografada</td> 
                    <td colspan="2">Opção</td>
                </tr>
                <?php while ($retorna = mysqli_fetch_array($sql)) { ?>
                    <tr>
                        <td><?php echo $retorna['id_usuario']; ?></td>
                        <td><?php echo $retorna['nome_usuario']; ?></td>
                        <td><?php echo $retorna['email_usuario']; ?></td>
                        <td><?php echo $retorna['senha_usuario']; ?></td>
                         <td><?php echo "<a href=delete_cli.php?deletar_cliente=".$retorna['id_usuario']. ">Excluir</a>"; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <?php
        }else{
            ?>
        <div class="msg">Nenhum cadastrado feito em "<?php echo $buscar ?>".</div>
        <?php
        }
        ?>
        }
        ?>
    </body>
</html>
