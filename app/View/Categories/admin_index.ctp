
	<div id="items"></div>


	<div class="titles clearfix">
		<div class="pull-left">
			<h2><?php echo __('Páginas') ?></h2>
		</div>
	</div>

	
	<?php echo $this->Session->flash(); ?>
<div class="panel panel-default">
  <div class="panel-body">
  	<table class="table table-bordered">
  		<thead>
  			<tr>
  				<th>Titulo</th>
  			</tr>
  		</thead>
  		<tbody>
  		<?php 
		foreach ($items as $item){
  			echo "<tr><td>".$item["Category"]["title"]."<tr></td>";
		} ?>
  		</tbody>
  	</table>


  </div>
</div>
	