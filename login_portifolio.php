<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Portifólio_Kakau</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <div class="cor"></div>
        <div class="cor"></div>
        <div class="cor"></div>
        <div class="box">
            <div class="quadrado" style="--i:0;"></div>
            <div class="quadrado" style="--i:1;"></div>
            <div class="quadrado" style="--i:2;"></div>
            <div class="quadrado" style="--i:3;"></div>
            <div class="quadrado" style="--i:4;"></div>
            <div class="container">
                <div class="formulario">
                    <h1>.:LOGIN PORTIFÓLIO:.</h1>
                    <form>
                        <div class="wrap-input margin-top-35 margin-bottom-35">
                            <input class="inputBox" type="text" name="email" autocomplete="off">
                            <span class="focus-input" data-placeholder="E-mail"></span>
                        </div>
                        <div class="wrap-input margin-bottom-35">
                            <input class="inputBox" type="password" name="password">
                            <span class="focus-input" data-placeholder="Senha"></span>
                        </div>

                        <div class="inputBtn">
                            <input type="submit" value="Login">
                        </div>
                        <p class="esqueci">Esqueceu a senha?
                            <a href="#">Click aqui!</a>
                        </p>
                        <p class="esqueci">Ainda não tem uma conta?
                            <a href="#">Cadastre-se!</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </section>
</body>

</html>