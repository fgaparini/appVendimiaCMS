<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<div id="items"></div>


	<div class="titles clearfix">
		<div class="pull-left">
			<h2><?php echo __('Categorías') ?></h2>
			
	</div>

		</div>
	
	<?php echo $this->Session->flash(); ?>
	<div class="row">
	<?php echo $this->Html->link( '<i class="icon-plus"></i> '.__("Add", true), array('action' => 'edit'), array('class' => 'btn btn-small', 'escape' => false));?> 
		<div class="col-md-6">
			<div class="panel panel-info">
				  <div class="panel-body">
						<table class="table">
							<thead>
								  			<tr>
								  				<th>Titulo</th>
								  				<th>Acciones</th>	
								  			</tr>
								  			
								</thead>
								  		<tbody>
								  		<?php 
										foreach ($items as $item){
								  			echo "<tr><td>".$item["Category"]["title"]."</td><td>"/*.$this->Html->link( '<i class="icon-pencil"></i> '.__("Edit", true), array('action' => 'edit', $item[$model]['id']), array( 'class' => 'btn btn-small', 'escape' => false) )." "*/.

								  			$this->Html->link( '<i class="icon-trash"></i> '.__("Eliminar", true), array('action' => 'delete', $item[$model]['id']), array( 'class' => 'btn btn-small', 'escape' => false) )	 ."</td><tr>";

										} ?>
								  		</tbody>
								  	</table>


								  </div>
								</div>
			</div>
	</div>