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
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];
            $id= $_SESSION['id_adm'] ;
        } else {
            header("location:../entrar.php");
            exit();
        }
        ?>
        <header> 
            <a href="#modal"><img class="user_top" src="../../img/usuario.png" title="Detalhes da conta"></a>
            <div class="logotipo">
                <img src="../../img/cube.png">
                <p id="logo">Brainbox</p>
            </div>
            <a href="../sair.php"><img class="sair" src="../../img/sair.png" title="Sair"></a>  
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
                        <li><a href="funcionarios_cadastrados.php">Funcionários</a></li>
                        <li><a href="gerentes_cadastrados.php">Gerentes</a></li>
                        <li><a href="#">Produtos</a></li>
                    </ul>
                </li>
                <li><a href="#"><img src="../../img/sv.png"><span>Pedidos</span></a>
                </li>
            </ul>
        </nav>
        <section id="main">
            <div class="modal" id="modal">
                <div class="modal__dialog">
                    <section class="modal__content">
                        <header class="modal__header">
                            <h2 class="modal__title"> Administrador<br>
                                Dados da Conta</h2>
                            <a href="#" class="modal__close">&times;</a>
                        </header>
                        <div class="modal__body">
                            <p>Nome: <?php echo $usuario; ?> <br>
                                E-mail: <?php echo $email; ?></p>
                        </div>
                        <footer class="modal__footer">
                            <button><?php echo "<a href=edit_adm.php?editar=".$id. "><font color='#fff'>Editar dados</font></a>"; ?></button><button><?php echo "<a href=delete_adm.php?deletar=".$id. "><font color='#fff'>Excluir conta</font></a>"; ?></button>
                        </footer>
                    </section>
                </div>
            </div>
        </section>
        <div id="copyright" class="container">
            <p>&copy; 2019| Todos os direitos reservados.| Design by <a href="#">BrainBox</a>.</p>
            <!--<a href="#menu"><div id="triangle-up"></div></a>-->

        </div>
    </body>
</html>
