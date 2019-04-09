<?php
    $idusuario = $_SESSION['id'];
    $con = conecta();

    if(isset($_POST['submit'])){
        $produto = trim($_POST['produto']);
        $nf = trim($_POST['nf']);
        $qtde = trim($_POST['quantidade']);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }else{
            $sql = "INSERT INTO tbl_estoque (nota_fiscal, produto_id, quantidade, tipo, id_usuario_logado, data_criacao, data_alteracao) VALUES ('$nf', $produto, $qtde, 1, $idusuario, NOW(), NOW())";
            $sql_update = "UPDATE tbl_produtos SET quantidade_estoque=quantidade_estoque+$qtde WHERE id = " .$produto;
            
            if ($con->query($sql) === TRUE) {
                $con->query($sql_update);
                $con->close();
                header('Location: base.php?pagina=estoque');
            } else {
                $con->close();
               echo "<Script> alert('Não foi possivel entrar com o produto no estoque!'); </Script>";
            }    
        }
   }
?>

<div class="page-header">
    <a href="?pagina=estoque">
        <button type="button" class="btn btn-default"><i class="fas fa-arrow-left"></i> Voltar</button>
    </a>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <div class="well well-sm">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3  control-label" for="produto">Produto</label>
                        <div class="col-md-9">
                            <select id="produto" name="produto" class="form-control" required>
                                <?php
                                    $res_cat = $con->query("SELECT id, nome FROM tbl_produtos");
                                    if ($res_cat){ 
                                        while ($orc = $res_cat->fetch_assoc()){
                                            echo "<option value='".$orc['id']."'>".$orc['nome']."</option>";    
                                        }
                                    }
                                ?>                           
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="nf">Nota fiscal</label>
                        <div class="col-md-9">
                            <input id="nf" name="nf"  value="" type="text" placeholder="Nota fiscal" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="quantidade">Quantidade</label>
                        <div class="col-md-9">
                            <input id="quantidade" name="quantidade" type="number" placeholder="quantidade" min="0" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" name="submit" value="Submit" class="btn btn-editar btn-lg">Salvar</button>
                        </div>
                    </div>
                    
                </fieldset>
            </form>
        </div>
    </div>
</div>


