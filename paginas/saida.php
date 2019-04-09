<?php
    $idusuario = $_SESSION['id'];
    $con = conecta();

    $erro = false;

    if(isset($_POST['submit'])){
        $produto = trim($_POST['produto']);
        $ref = trim($_POST['ref']);
        $qtde = trim($_POST['quantidade']);
        $qtde_estoque = trim($_POST['quantidade_estoque']);

        if ($qtde_estoque < $qtde){
            $erro=true;
        }else{
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }else{
                $sql = "INSERT INTO tbl_estoque (referencia, produto_id, quantidade, tipo, id_usuario_logado, data_criacao, data_alteracao) VALUES ('$ref', $produto, $qtde, 2, $idusuario, NOW(), NOW())";
                $sql_update = "UPDATE tbl_produtos SET quantidade_estoque=quantidade_estoque-$qtde WHERE id = " .$produto;
                
                if ($con->query($sql) === TRUE) {
                    $con->query($sql_update);
                    $con->close();
                    header('Location: base.php?pagina=estoque');
                } else {
                    $con->close();
                   echo "<Script> alert('Não foi possivel sair com o produto no estoque!'); </Script>";
                }    
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
    <div class="col-md-10 col-md-offset-1">
        <div class="well well-sm">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-2  control-label" for="produto">Produto</label>
                        <div class="col-md-4">
                            <select id="produto" name="produto" class="form-control" required>
                                <?php
                                    $qtde=0;
                                    $res_cat = $con->query("SELECT id, nome, quantidade_estoque FROM tbl_produtos");
                                    if ($res_cat){ 
                                        while ($orc = $res_cat->fetch_assoc()){
                                            if (!$qtde){$qtde = $orc['quantidade_estoque'];}
                                            echo "<option value='".$orc['id']."'>".$orc['nome']."</option>";
                                        }
                                    }
                                ?>                           
                            </select>
                        </div>

                        <label class="col-md-2 control-label" for="ref">Referência</label>
                        <div class="col-md-4">
                            <input id="ref" name="ref"  value="" type="text" placeholder="Referência" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="quantidade_estoque">Qtde. em estoque</label>
                        <div class="col-md-4">
                            <input id="quantidade_estoque" name="quantidade_estoque" type="number" value="<?php echo $qtde; ?>" class="form-control" readonly>
                        </div>

                        <label class="col-md-2 control-label" for="quantidade">Quantidade</label>
                        <div class="col-md-4">
                            <input id="quantidade" name="quantidade" type="number" placeholder="Quantidade" class="form-control" required>
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

        <?php if ($erro): ?>
            <div class="alert alert-danger text-center" role="alert">
                <strong>Erro!</strong>
                Não foi possível fazer a saida, pois a quantidade requisitada é maior que a do estoque.
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#produto').change(function(){
            //Selected value
            var inputValue = $(this).val();

            //Ajax for calling php function
            $.post('lib/qtdeprod.php', { dropdownValue: inputValue }, function(data){
                $('#quantidade_estoque').val(data);

            });
        });
    });
</script>