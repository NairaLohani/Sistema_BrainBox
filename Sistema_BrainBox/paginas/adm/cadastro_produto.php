<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Cadastro de Categoria</title>
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/">
    </head>
    <body>
        <?php
        include_once './administrador.php';
         require_once '../../classes/Produto.php';
        $produto = new Produto();
        include_once '../../classes/conexao.php';
        $consultacategoria = 'select * from categoria';
        $produtos = mysqli_query($conn, $consultacategoria);
        ?>
        <div class="loginbox">
            <h1>Cadastro de Produto</h1>
            <form method="post">
                <input type="text" name="nome" placeholder="Nome" required="" maxlength="30">
                <input type="number" name="preco" step="0.01" placeholder="Preço" required="" maxlength="30">
                <select id="s1" name="tipo">
                    <option value="1">Comida</option>
                    <option value="2">Bebida</option>
                </select>
                <select id="s1" name="categoria">
                    <?php
                    while ($nomecategoria = mysqli_fetch_array($produtos)) {
                        ?>
                        <option value="<?php echo $nomecategoria['tipo_categoria']; ?>"><?php echo $nomecategoria['tipo_categoria']; ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                <input type="submit" name="" value="Cadastrar">
            </form>
        </div>

        <?php
        //verificar se clicou no botao
        if (isset($_POST['tipo'])) {
            $nome = addslashes($_POST['nome']);
            $preco = addslashes($_POST['preco']);
            $tipo = ($_POST['tipo']);
            $categoria = ($_POST['categoria']);
            if (!empty($nome) && !empty($preco) && !empty($tipo) && !empty($categoria)) {
                $produto->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($produto->msgErro == "") {//se esta tudo ok
                    if ($produto->cadastrar_produto($nome, $preco, $tipo, $categoria)) {
                        ?>
                        <div id="popup_sucesso">
                            <img src="../img/good-quality.png"><br>
                            Cadastrado com sucesso!<br>
                            <a href="cadastro_produto.php">
                                <button>Ok</button></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div id="popup_erro">
                            <img src="../img/warning.png"><br>
                            Produto já cadastrado! <br>
                            <a href="cadastro_produto.php">
                                <button> Ok</button></a></div>
                        <?php
                    }
                } else {
                    ?>
                    <div id="msg_Erro">
                        <?php echo "Erro" . $produto->msgErro; ?>
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
