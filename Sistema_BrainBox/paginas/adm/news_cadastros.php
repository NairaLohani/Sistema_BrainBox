<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Novos Cadastros</title>

    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/usuarios.php';
        $a = new Usuario();
        ?>
        <div class="loginbox">
            <h1>Cadastrar novo usuário</h1>
            <form method="post">
                <input type="text" name="nome" placeholder="Nome" required="" maxlength="30">
                <input type="email" name="email" placeholder="E-mail" required="" maxlength="45">
                <input type="password" name="senha" placeholder="Senha" required="" maxlength="30">
                <input type="password" name="conf_senha" placeholder="Confirmar Senha" required="" maxlength="30">
                <select name="nivel">
                    <option value="2">Funcionário</option>
                    <option value="3">Gerente</option>
                    <option value="4">Administrador</option> 
                </select>
                <input type="submit" name="" value="Cadastrar">
            </form>
        </div>
        <?php
        //verificar se clicou no botao
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $nivel = $_POST['nivel'];
            $confirmarSenha = addslashes($_POST['conf_senha']);
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

                $a->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($a->msgErro == "") {//se esta tudo ok
                    if ($senha == $confirmarSenha) {
                        if ($a->news_cadastros($nome, $email, $senha, $nivel)) {
                            ?>
                            <div id="popup_sucesso">
                                <img src="../../img/good-quality.png"><br>
                                Cadastrado com sucesso!<br>
                                <a href="news_cadastros.php">
                                    <button>Ok</button></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div id="popup_erro">
                                 <img src="../../img/warning.png"><br>
                                E-mail já cadastrado! <br>
                                <a href="news_cadastros.php">
                               <button> Ok</button></a></div>
                            <?php
                        }
                    } else {
                        ?>
                        <div  id="popup_erro">
                            <img src="../../img/warning.png"><br>
                            Senhas não coincidem!<br> <a href="news_cadastros.php"> 
                                <a href="news_cadastros.php"><button>Ok</button></a>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $a->msgErro; ?>
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
