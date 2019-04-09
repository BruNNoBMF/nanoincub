<div class="panel panel-custom filterable">
        <div class="panel-heading">
        	<h3 class='panel-title'>Lista de movimentação no estoque</h3>
        </div>
        <table class="table">
	        <thead>
	            <tr class="filters">
	                <th width="5%">ID</th>
					<th>Produto</th>
            		<th>Categoria</th>
            		<th width='8%'>Tipo</th>
            		<th width='8%'>Qtde.</th>
            		<th>Usuario</th>
            		<th>Documento</th>
	                <th>Data movimentação</th>
	            </tr>
	        </thead>
	        <tbody >
	            <?php while ($orc = $res->fetch_assoc()){ ?>
				    <tr>
				        <td><?php echo $orc['id']; ?></td>
				        <td><?php echo $orc['produto']; ?></td>
				        <td><?php echo $orc['categoria']; ?></td>
				        <td><?php echo formata_tipo($orc['tipo']); ?></td>
				        <td><?php echo $orc['quantidade']; ?></td>
				        <td><?php echo $orc['email']; ?></td>
				        <td><?php 
				        	if ($orc['tipo']==1){
				        		echo $orc['nota_fiscal']; 
				        	}else{
				        		echo $orc['referencia']; 	
				        	} 
				        ?></td>
				        <td><?php echo formata_data($orc['data_criacao']); ?></td>
				    </tr>
				<?php } ?>
	        </tbody>
	    </table>
    </div>