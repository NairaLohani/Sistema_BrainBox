<!DOCTYPE html>
<html>
    <head>
        <title>Funcionário - Cadastrastro de Clientes</title>
        <meta charset="utf-8">
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <?php
        require_once '../../classes/usuarios.php';
        include_once './funcionario.php';
        $u = new Usuario;
        ?>
            <div class="loginbox">
                <h1>Cadastro de Clientes</h1>
                <form method="post">

                    <input type="text" name="nome" placeholder="Nome" required="" maxlength="20">

                    <input type="email" name="email" placeholder="E-mail" required="" maxlength="45">

                    <input type="password" name="senha" placeholder="Senha" required="" maxlength="30">
                    <input type="password" name="conf_senha" placeholder="Confirmar Senha" required="" maxlength="30">
                    <input type="submit" name="" value="Cadastrar">
                </form>
            </div>

            <?php
            //verificar se clicou no botao
            if (isset($_POST['nome'])) {
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $confirmarSenha = addslashes($_POST['conf_senha']);
                if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

                    $u->conectar("sistema_lanchonete", "localhost", "root", "");
                    if ($u->msgErro == "") {//se esta tudo ok
                        if ($senha == $confirmarSenha) {
                            if ($u->cadastrar($nome, $email, $senha)) {
                                ?>
                                <div id="popup_sucesso">
                                    <img src="../../img/good-quality.png"><br>
                                    Cadastrado com sucesso!<br>
                                    <a href="cadastro_cliente.php">
                                        <button>Ok</button></a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div id="popup_erro">
                                    <img src="../../img/warning.png"><br>
                                    E-mail já cadastrado! <br>
                                    <a href="cadastro_cliente.php">
                                        <button> Ok</button></a></div>
                                <?php
                            }
                        } else {
                            ?>
                            <div  id="popup_erro">
                                <img src="../../img/warning.png"><br>
                                Senhas não coincidem!<br> 
                                <a href="cadastro_cliente.php"><button>Ok</button></a>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div id="msg_Erro">
                            <?php echo "Erro" . $u->msgErro; ?>
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
    </body>
</html>