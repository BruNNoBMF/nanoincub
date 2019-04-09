<?php
require 'config.php';
require 'lib/funcs.php';
require 'template/header.php';

$erro = false;

session_start();
unset ($_SESSION['email']);
unset ($_SESSION['senha']);
unset ($_SESSION['id']);

if(isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $con = conecta();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{
        $res = $con->query("SELECT email, senha, id FROM tbl_usuarios WHERE email='$email' AND senha='$senha'");

        if ($res->num_rows!=0){ 
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            $result = $res->fetch_assoc(); 
            $_SESSION['id'] = $result['id'];
            $con->close();
            header('Location: base.php?pagina=categorias');    
        } else {
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['id']);
            $erro = true;
            $con->close();
        }    
    }
}

?>
<div class="row">
    <div class="col-sm-4 col-xs-offset-4">
        <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
                <img src="imagens/logo-site-nanoincub.png" alt="Image" class="block-center img-rounded">
            </div>
            <div class="panel-body">
              <form id="formlogin" method="post">
                <p class="text-center pv">Entre para continuar</p>
                <div class="form-group has-feedback">
                    <input class="form-control" id="email" name="email" placeholder="E-mail" required type="email" />
                </div>
                <div class="form-group has-feedback">
                    <input autocomplete="off" class="form-control" id="senha" name="senha" placeholder="Senha" required type="password" />
                </div>
                  <button type="submit" name="submit" value="Submit" class="btn btn-block btn-primary mt-lg">Login</button>
              </form>
            </div>

            <?php if ($erro): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <strong>Erro!</strong>
                    Não foi possível fazer login, verifique seu email e senha.
                </div>
            <?php endif; ?>
        </div>
        <div class="p-lg text-center">
            <span><?= date("Y"); ?></span>
        </div>
    </div>
</div>

<?php
require 'template/footer.php';
?>      


