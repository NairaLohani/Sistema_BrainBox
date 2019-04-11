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
        <style>
            .tablebox input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="date"]
            {
                width:30%;
                border:1px solid #CFD8DC;
                margin-top:5px;
                outline:none;
                padding:7px;
                box-sizing:border-box;
                background: #fff;
                font-size: 0.9em;
                font-family: 'Rubik', sans-serif;
                transition:.3s;
                color: #512D38;
                font-size: 16px;
            }
            .tablebox input[type="submit"]{
                border: none;
                outline: none;
                padding:8px;
                background: #222d32;
                color: #fff;
                font-size: 1em;
                text-transform: uppercase;
                margin-top: 18px;
                font-family: 'Rubik', sans-serif;
                cursor: pointer;
            }
            
            p{
                margin-top: 1em;
            }
            #all{
                font-size: 1em;
                margin-top:2em;
                color:#1A237E;
            }
        </style>
    </head>
    <body>
        <?php
        include_once './administrador.php';
        include_once '../../classes/conexao.php';
        ?>
        <div class="tablebox">
            <form method="post" name="searchform" action="pesquisa_por_nome.php">
                <h1>Opções de Pesquisa</h1>
                <p>Nome do Cliente</p>
                <input type="text" name="buscar" required="" placeholder="Nome do Cliente">
                <input type="submit" value="Buscar">
            </form>
            <form method="post" name="searchform" action="pesquisa_por_data.php">
                <p>Data de Cadastro</p>
                <input type="date" name="buscar" required="" placeholder="Pesquisar">
                <input type="submit" value="Buscar">
                <a href="clientes_cadastrados.php"><p id="all"><u>Todos os clientes cadastrados</u></p></a>    
            </form>
        </div>
    </body>
</html>