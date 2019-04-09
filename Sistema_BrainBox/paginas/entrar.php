<!DOCTYPE html>
<html>
    <head>
        <title>Entrar</title>
        <meta charset="utf-8">
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/style_entrar.css">
    </head>
    <body>
         
         <a href="../home.php"><img class="icon" src="../img/house.png"></a>
        <div class="loginbox">
            <img src="../img/2.png" class="avatar">
            <h1>Entrar</h1>
            <form method="post" action="../classes/usuarios_entrar.php">
                <p>E-mail</p>
                <input type="email" name="email" placeholder="E-mail" required="required" maxlength="45">
                <p>Senha</p>
                <input type="password" name="senha" placeholder="Senha" required="required" maxlength="30">
                <div class="log">
                <input type="submit" name="" value="Entrar">
                </div>
            </form>
        </div>
        <div id="copyright" class="container">
    <p>&copy; 2019| Todos os direitos reservados.| Design by <a href="#">BrainBox</a>.</p>
    <!--<a href="#menu"><div id="triangle-up"></div></a>-->
        </div>
    </body>
</html>