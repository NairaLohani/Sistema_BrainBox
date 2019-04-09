<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/style_admin.css" type="text/css" media="all" />
    </head>
    <body>
        <?php
        include_once 'administrador.php';
        require_once '../../classes/conexao.php';
        if (isset($_GET['deletar'])) {
            $sql = 'delete from usuarios where id_usuario=' . $_GET['deletar'];
            mysqli_query($conn, $sql);
            header("location:../../paginas/entrar.php");
        }
        if (isset($_GET['deletar_cliente'])) {
            $sql = 'delete from usuarios where id_cliente=' . $_GET['deletar_cliente'];
            mysqli_query($conn, $sql);
            header("location:../../paginas/entrar.php");
        }
        
        if (isset($_GET['editar'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $idm = $_GET['editar'];
            $confirmarSenha = addslashes($_POST['conf_senha']);
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
                if ($senha == $confirmarSenha) {
                    $sql = "update usuarios set nome_usuario='$nome', email_usuario='$email', senha_usuario=md5('$senha') where id_usuario='$idm'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    ?>
                    <div id="popup_sucesso">
                        <img src="../../img/good-quality.png"><br>
                        Atualizado com sucesso!<br>
                        <a href="../sair.php">
                            <button>Ok</button></a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div  id="popup_erro">
                        <img src="../../img/warning.png"><br>
                        Senhas não coincidem!<br> 
                        <a href="edit_adm.php"><button>Ok</button></a>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="mgs_Erro">Preencha todos os campos!</div>
                <?php
            }
        }
        ?>
        <br>
        <a href="formTurma.php">Voltar</a>
    </body>
</html>
