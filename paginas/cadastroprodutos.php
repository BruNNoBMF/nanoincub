<?php
    $id = isset($_GET['id'])? $_GET['id']:'';
    $con = conecta();
    $res = $con->query("SELECT * FROM tbl_produtos WHERE id = " . $id);
    if ($res){ $result = $res->fetch_assoc(); }else{$result=null;} 

    if(isset($_POST['submit'])){
        $produto = trim($_POST['produto']);
        $categoria = trim($_POST['categoria']);
        $preco = trim($_POST['preco']);

        if ($con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{

            if ($id){
                $sql = "UPDATE tbl_produtos SET nome='$produto', preco=$preco, categoria_id=$categoria, data_alteracao=NOW() WHERE id = " .$id;
            }else{
                $sql = "INSERT INTO tbl_produtos (nome, preco, quantidade_estoque, categoria_id, data_criacao) VALUES ('$produto', $preco, 0, $categoria, NOW())";    
            }

            if ($con->query($sql) === TRUE) {
                $con->close();
                header('Location: base.php?pagina=produtos');
            } else {
                $con->close();
                echo "<Script> alert('Não foi possivel salvar o produto!'); </Script>";
            }    
        }
    }
?>


<div class="page-header">
    <a href="?pagina=produtos">
        <button type="button" class="btn btn-default"><i class="fas fa-arrow-left"></i> Voltar</button>
    </a>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <div class="well well-sm">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="cliente">Produto</label>
                        <div class="col-md-9">
                            <input id="produto" name="produto" value="<?php echo $result['nome']; ?>" type="text" placeholder="Produto" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3  control-label" for="categoria">Categoria</label>
                        <div class="col-md-9">
                            <select id="categoria" name="categoria" class="form-control" required>
                                <?php
                                    $res_cat = $con->query("SELECT id, nome FROM tbl_categorias");
                                    if ($res_cat){ 
                                        while ($orc = $res_cat->fetch_assoc()){
                                            if ($orc['id'] == $result['categoria_id']){
                                                echo "<option value='".$orc['id']."' selected=selected'>".$orc['nome']."</option>";
                                            }else{
                                                echo "<option value='".$orc['id']."'>".$orc['nome']."</option>";    
                                            }
                                        }
                                    }

                                ?>                           
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="preco">Preço</label>
                        <div class="col-md-9">
                            <input id="preco" name="preco" value="<?php echo $result['preco']; ?>" type="number" step="0.01" placeholder="Preço" class="form-control" required>
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


