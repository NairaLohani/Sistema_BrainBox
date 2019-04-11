<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador</title>
        <style>
            .modal{
    margin-top: 4.5em;
    display:none;
    position:fixed;
    height:30%;
    width:20%;
    z-index: 9;
    margin-left: 75%;
}
.modal:target{
    display:table;
}
.modal__body p{
    text-align: center;
    padding-top: 5px;
    font-size:14px;
    color:#222d32;
    font-weight: 500;
    font-family: 'Rubik', sans-serif;
}
.modal__body {
    height: 45px;
}

.modal__content{
    background:rgb(255, 255, 255);
    width:100%;
    min-width:200px;
    margin:auto;
    position:absolute;
    animation: slideUp 0.1s ease-in-out;
    box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.24);
}

.modal__header{
    background:#E53935;
    color:rgba(255, 255, 255, 0.8);
    padding:1rem;
    height: 50px;
    position:relative;
}
h2{
    margin: 0;
    text-align: center;
    font-size:12px;
    color:#fff;
    font-weight: 500;
    text-transform: uppercase;
    font-family: 'Rubik', sans-serif;
}
.modal__close{
    color:#fff;
    text-decoration: none;
    position:absolute;
    top:1rem;
    right:1rem;
}
.modal__footer{
    padding:1rem;
    height: 60px;
    border-top:1px solid #ccc;
}
.modal__footer button{
    text-decoration: none;
    width: 48%;
    padding:5px;
    margin-top: -5px;
    background:#f93434;
    display:inline-block;
    justify-content: center;
    border-radius:3px;
    margin-left: 4px;
    color:#fff;
    font-size: 11px;
    text-align: center;
    text-transform: uppercase;
    font-weight: 500;
    font-family: 'Rubik', sans-serif;
}
        </style>
    </head>
    <body>
        <?php
        include_once 'administrador.php';
        include_once '../../classes/conexao.php';
        if (isset($_GET['excluir_cliente'])) {
            $sql = 'delete from usuarios where id_usuario=' . $_GET['excluir_cliente'];
            mysqli_query($conn, $sql);
            ?>
            <div id="popup_sucesso">
                <img src="../../img/good-quality.png"><br>
                Cliente excluido!<br>
                <a href="clientes_cadastrados.php">
                    <button>Ok</button></a>
            </div>
            <?php
        }
        if (isset($_GET['excluir_funcionario'])) {
            $sql = 'delete from usuarios where id_usuario=' . $_GET['excluir_funcionario'];
            mysqli_query($conn, $sql);
            ?>
            <div id="popup_sucesso">
                <img src="../../img/good-quality.png"><br>
                Funcionário excluido!<br>
                <a href="funcionarios_cadastrados.php">
                    <button>Ok</button></a>
            </div>
            <?php
        }
            
        if (isset($_GET['excluir_gerente'])) {
            $sql = 'delete from usuarios where id_usuario=' . $_GET['excluir_gerente'];
            mysqli_query($conn, $sql);
            ?>
            <div id="popup_sucesso">
                <img src="../../img/good-quality.png"><br>
                Gerente excluido!<br>
                <a href="gerentes_cadastrados.php">
                    <button>Ok</button></a>
            </div>
            <?php
        }
        if (isset($_GET['deletar'])) {
            $sql = 'delete from usuarios where id_usuario=' . $_GET['deletar'];
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
