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
    <link rel="stylesheet" href="style_login.css">
    <title>Cadastro_Portifólio_Kakau</title>
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
            <div class="container_cad">
                <div class="formulario_cad">
                    <h1>.:CADASTRO:.</h1>
                    <form method="POST">
                        <div class="inputBox">
                            <input type="text" name="Nome" placeholder="Nome completo" autocomplete="off">
                            <!-- <span class="focus-input"></span> -->
                        </div>
                        <div class="inputBox">
                            <input type="text" name="telefone" placeholder="Telefone" autocomplete="off">
                            <!-- <span class="focus-input"></span> -->
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="Email">
                            <!-- <span class="focus-input"></span> -->
                        </div>
                        <div class="inputBox">
                            <input type="password" name="senha" placeholder="Senha">
                            <!-- <span class="focus-input"></span> -->
                        </div>
                        <div class="inputBox">
                            <input type="password" name="confsenha" placeholder="Confirme sua senha">
                            <!-- <span class="focus-input"></span> -->
                        </div>
                        <div class="inputBtn">
                            <input type="submit" value="Cadastrar">
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <?php
    if(isset($_POST['Nome']))
    {
        $nome = addslashes($_POST['Nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confsenha']);
        //verificar se está preeenchido

        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
        {
            $usuario->conectar("portifolio_login","localhost","root","");
            if($usuario->msgErro == "") //tudo ok
            {
                if($senha==$confirmarSenha)
                {
                    if($usuario->cadastrar($nome, $telefone, $email, $senha))
                    {
                        ?>
                        <div id="msg-erro">
                            Cadastrado com Sucesso!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div id="msg-erro">
                            Email já Cadastrado!
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div id="msg-erro">
                            Senha e Confirmar Senha Não Correspondem.
                        </div>
                        <?php
                }
            }
            else
            {
                ?>
                        <div id="msg-erro">
                            <?php echo"Erro: ".$usuario->msgErro ?>
                        </div>
                        <?php
            }
        }
        else
        {
            ?>
                        <div id="msg-erro">
                            Preencha todos os campo!
                        </div>
                        <?php
        }

    }
    
    
    ?>
    
</body>

</html>