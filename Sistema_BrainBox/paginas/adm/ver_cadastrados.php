<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador - Opções de Pesquisa</title>
    </head>
    <body>
         <?php
        include_once './administrador.php';
        include_once '../../classes/conexao.php';
        ?>
        <div class="loginbox">
            <form method="post" name="searchform" action="pesquisa_por_nome.php">
                <h1>Opções de Pesquisa</h1>
            <p>Nome</p>
            <input type="text" name="buscar" placeholder="Pesquisar">
            <input id="botao"  type="submit" value="Buscar">
            </form>
            <form method="post" name="searchform" action="pesquisa_por_data.php">
            <p>Data de Cadastro</p>
            <input type="date" name="buscar" placeholder="Pesquisar">
            <input id="botao" type="submit" value="Buscar">
            <a href="clientes_cadastrados.php"><p id="link"><u>Ver todos os cadastros</u></p></a>    
        </form>
        </div>
    </body>
</html>