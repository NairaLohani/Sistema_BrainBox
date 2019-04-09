<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Criar Administrador</title>
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../../css/style_cadastro.css">
    </head>
    <body>
        <?php
        include_once '../../classes/usuarios.php';
        $a = new Usuario();
        ?>
         <a href="../../home.php"><img class="icon" src="../../img/house.png"></a>
        <div class="loginbox">
             <img src="../../img/2.png" class="avatar">
            <h1>Criar Administrador</h1>
            <form method="post">

                <input type="text" name="nome" placeholder="Nome" required="" maxlength="20">
                <input type="email" name="email" placeholder="E-mail" required="" maxlength="45">
                <input type="password" name="senha" placeholder="Senha" required="" maxlength="30">
                <input type="password" name="conf_senha" placeholder="Confirmar Senha" required="" maxlength="30">
                <input type="submit" name="" value="Criar">
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

                $a->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($a->msgErro == "") {//se esta tudo ok
                    if ($senha == $confirmarSenha) {
                        if ($a->criar_ADM($nome, $email, $senha)) {
                            ?>
                            <div id="popup_sucesso">
                                <img src="../../img/good-quality.png"><br>
                                Cadastrado com sucesso!<br>
                                <a href="../entrar.php">
                                    <button>Ok</button></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div id="popup_erro">
                                <img src="../../img/warning.png"><br>
                                Administrador já cadastrado! <br>
                                <a href="Criar_Adm_Inicial.php">
                                    <button> Ok</button></a></div>
                            <?php
                        }
                    } else {
                        ?>
                        <div  id="popup_erro">
                            <img src="../../img/warning.png"><br>
                            Senhas não coincidem!<br> <a href="news_cadastros.php"> 
                                <a href="Criar_Adm_Inicial.php"><button>Ok</button></a>
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
                <div id="copyright" class="container">
                <p>&copy; 2019| Todos os direitos reservados.| Design by <a href="#">BrainBox</a>.</p>
                <!--<a href="#menu"><div id="triangle-up"></div></a>-->

            </div>
    </body>
</html>
