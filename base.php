<?php

$get = isset($_GET['pagina'])? $_GET['pagina']:'';

require 'config.php';
require 'lib/funcs.php';
require 'template/header.php';

session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('location:index.php');
}

require 'template/menu.php';

?>
<div class="container">
<?php
rotas($get);
?>
</div> <!-- /container -->
<?php
require 'template/footer.php';
?>   