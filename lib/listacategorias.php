<div class="panel panel-custom filterable">
        <div class="panel-heading">
        	<h3 class='panel-title'>Lista de categorias</h3>
        </div>
        <table class="table">
	        <thead>
	            <tr class="filters">
	                <th width="5%">ID</th>
	                <th>Categoria</th>
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
				        <td><?php echo formata_data($orc['data_criacao']); ?></td>
				        <td><?php echo formata_data($orc['data_alteracao']); ?></td>
				        <td>
				            <?php 
				            	echo "<a title='Editar categoria' class='btn btn-editar' href='?pagina=cadastrocategorias&id=". $orc['id'] ."'> <i class='fas fa-edit'></i></a>";
					        ?>
				        </td>
				        <td>
				        	<?php 
			            		echo "<a title='Excluir categoria' href='excluir.php?id=". $orc['id'] ."&tipo=1' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\" class='btn btn-excluir'> <i class='fas fa-trash-alt'></i></a>";
				        	?>
				        </td>
				    </tr>
				<?php } ?>
	        </tbody>
	    </table>
    </div>