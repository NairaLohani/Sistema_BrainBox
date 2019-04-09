<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrar</title>
        <link rel="stylesheet" type="text/css" href="../css/style_entrar.css">
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <?php
        $msgErro = ""; // tudo ok
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $nome = 'sistema_lanchonete';
        try {
            $conn = mysqli_connect($host, $user, $pass, $nome);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email_usuario='$email' AND senha_usuario=md5('$senha')");
            $num = mysqli_num_rows($sql);
            if ($num > 0) {
                while ($per = mysqli_fetch_array($sql)) {
                    $tipo = $per['nivel_usuario'];
                    $nome = $per['nome_usuario'];
                    $ident = $per['id_usuario'];
                    $email = $per['email_usuario'];
                    $senha = $per['senha_usuario'];

                    if ($tipo == 1) {
                        session_start();
                        $_SESSION['cliente'] = $nome;
                        $_SESSION['id_cli'] = $ident;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        echo '<script type="text/javascript">window.location="../paginas/cliente/cliente.php"</script>';
                    } elseif ($tipo == 2) {
                        session_start();
                        $_SESSION['funcionario'] = $nome;
                        $_SESSION['id_fun'] = $ident;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        echo '<script type="text/javascript">window.location="../paginas/funcionario/cadastro_cliente.php"</script>';
                    } elseif ($tipo == 3) {
                        session_start();
                        $_SESSION['gerente'] = $nome;
                        $_SESSION['id_ge'] = $ident;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        echo '<script type="text/javascript">window.location="../paginas/gerente/gerente.php"</script>';
                    } elseif ($tipo == 4) {
                        session_start();
                        $_SESSION['administrador'] = $nome;
                        $_SESSION['id_adm'] = $ident;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        echo '<script type="text/javascript">window.location="../paginas/adm/news_cadastros.php"</script>';
                        return TRUE;
                    }
                }
            } else {
                ?>
                <div id="popup_erro">
                    <img src="../img/warning.png"><br>
                    E-mail e/ou senha <br> estão incorretos!<br>
                    <a href="../paginas/entrar.php">
                        <button> Ok</button></a></div>
                <?php
            }
        }
        ?>

    </div>
</body>
</html>
