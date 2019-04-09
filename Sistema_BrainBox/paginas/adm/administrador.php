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
        <link rel="stylesheet" href="../../css/style_admin.css" type="text/css" media="all" />
        <link href="../../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['administrador'])) {
            $usuario = $_SESSION['administrador'];
        } else {
            header("location:../entrar.php");
            exit();
        }
        ?>
        <header>
            <img class="cube" src="../../img/cube.png">
            <a href="news_cadastros.php"><img class="user_top" src="../../img/user2.png"></a>
            <p id="logo">Brainbox</p>
            <p id="user">Administrador</p>
            <p id="name"><?php echo $usuario; ?></p>
            <a href="editar_dados.php"> <img class="conf" src="../../img/st.png" title="Editar dados"></a>
            <a href="../sair.php"><img class="sair" src="../../img/exit.png" title="Sair"></a>
        </header>
        <nav id="nav">
            <ul>
                <li><a href="#"><img src="../../img/team.png"><span>Cadastrar</span></a>
                    <ul>
                        <li><a href="news_cadastros.php">Usuário</a></li>
                        <li><a href="cadastro_categoria.php">Categoria</a></li>
                        <li><a href="cadastro_produto.php">Produto</a></li>
                    </ul>
                </li>
                <li><a href="#"><img class="icones" src="../../img/cs.png"><span>Cadastrados</span></a>
                    <ul>
                        <li><a href="ver_cadastrados.php">Clientes</a></li>
                        <li><a href="#">Funcionários</a></li>
                        <li><a href="#">Gerentes</a></li>
                        <li><a href="#">Produtos</a></li>
                    </ul>
                </li>
                <li><a href="#"><img src="../../img/sv.png"><span>Pedidos</span></a>
                    <ul>
                         <li><a href="#">Imprimir</a></li>
                        <li><a href="#">Alterar status</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <section id="main">

        </section>
        <div id="copyright" class="container">
            <p>&copy; 2019| Todos os direitos reservados.| Design by <a href="#">BrainBox</a>.</p>
            <!--<a href="#menu"><div id="triangle-up"></div></a>-->

        </div>
    </body>
</html>
