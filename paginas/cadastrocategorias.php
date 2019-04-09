<?php
    $id = isset($_GET['id'])? $_GET['id']:'';
    $con = conecta();
    $res = $con->query("SELECT * FROM tbl_categorias WHERE id = " . $id);
    if ($res){ $result = $res->fetch_assoc(); }else{$result=null;}

    if(isset($_POST['submit'])){
        $categoria = trim($_POST['categoria']);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }else{
            if ($id){
                $sql = "UPDATE tbl_categorias SET nome='$categoria', data_alteracao=NOW() WHERE id = ". $id;
            }else{
                $sql = "INSERT INTO tbl_categorias (nome, data_criacao) VALUES ('$categoria', NOW())";
            }
            
            if ($con->query($sql) === TRUE) {
                $con->close();
                header('Location: base.php?pagina=categorias');
            } else {
                $con->close();
               echo "<Script> alert('Não foi possivel salvar a categoria!'); </Script>";
            }    
        }
   }
?>

<div class="page-header">
    <a href="?pagina=categorias">
        <button type="button" class="btn btn-default"><i class="fas fa-arrow-left"></i> Voltar</button>
    </a>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <div class="well well-sm">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="categoria">Categoria</label>
                        <div class="col-md-9">
                            <input id="categoria" name="categoria"  value="<?php echo $result['nome']; ?>" type="text" placeholder="Categoria" class="form-control" required>
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


