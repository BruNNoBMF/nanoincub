<div class="panel panel-custom filterable">
        <div class="panel-heading">
            <h3 class='panel-title'>Lista de produtos</h3>
        </div>
        <table class="table">
	        <thead>
	            <tr class="filters">
	                <th width="5%">ID</th>
					<th>Produto</th>
            		<th>Categoria</th>
            		<th width='8%'>Preço</th>
                    <th width='8%'>Qtde.</th>
	                <th>Data criação</th>
					<th>Data alteração</th>
					<th width="5%"></th>
					<th width="5%"></th>
	            </tr>
	        </thead>
	        <tbody >
	            <?php while ($orc = $res->fetch_assoc()){ ?>
				    <tr>
				        <td><?php echo $orc['id']; ?></td>
				        <td><?php echo $orc['nome']; ?></td>
				        <td><?php echo $orc['categoria']; ?></td>
				        <td><?php echo formata_reais($orc['preco']); ?></td>
				        <td><?php echo $orc['quantidade_estoque']; ?></td>
				        <td><?php echo formata_data($orc['data_criacao']); ?></td>
				        <td><?php echo formata_data($orc['data_alteracao']); ?></td>
				        <td>
				            <?php 
					            echo "<a title='Editar produto' class='btn btn-editar' href='?pagina=cadastroprodutos&id=". $orc['id'] ."'> <i class='fas fa-edit'></i></a>"; 
					        ?>
				        </td>
				        <td>
				        	<?php 
				            	echo "<a title='Excluir produto' href='excluir.php?id=". $orc['id'] ."&tipo=2' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\" class='btn btn-excluir'> <i class='fas fa-trash-alt'></i></a>";
				        	?>
				        </td>
				    </tr>
				<?php } ?>
	        </tbody>
	    </table>
    </div>