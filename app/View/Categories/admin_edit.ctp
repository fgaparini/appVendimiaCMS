	<div id="items">

		<div class="titles clearfix">
			<div class="pull-left">
				<h2><?php if(empty($this->request->data[$model]['id'])) echo __('Add', true); else echo __('Edit', true); ?> <?php echo __('Página') ?></h2>
			</div>
			
			<div class="pull-right btn-group">
			<?php
				//echo $this->Html->link( __("General + EN", true), '#tab-pane_grl', array('data-toggle' => 'tab', 'class' => 'btn btn-small active', 'escape' => false));
				//echo $this->Html->link( __("ES", true), '#tab-pane_spa', array('data-toggle' => 'tab', 'class' => 'btn btn-small', 'escape' => false));
			?>
			</div>
			
		</div>

		<?php echo $this->Form->create($model, array('type' => 'file', 'class' => '', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 's350'))) ?>
		<div class="tabbable tabbable-bordered form-vertical">

			<div class="tab-content tab-content-empty">

				<div id="tab-pane_grl" class="tab-pane active updateMapWithAddress">


						<div class="well form-vertical form-box">
							<fieldset>						

								<div class="control-group clearfix">
						
									<div class="form-control">
									
										<?php echo $this->Form->input($model.'.title',array("placeholder"=>"Ingrese nombre de categoría"), array('error' => array('required' => __("Ingrese el nombre de categoria", true)) ) ); ?>
								
									</div>
								</div>


								


		<div class="form-footer clearfix">
			<?php echo $this->Form->submit( __("Save", true), array('div' => false, 'class' => 'btn btn-primary') ); ?> <?php echo $this->Html->link( __("Cancel", true), array('action'=>'back', 'index'), array('class' => 'btn btn-small')) ?>
		</div>

		
		

	</div>
	<?php echo $this->Form->end(); ?>

	<script type="text/javascript">
	$(document).ready(function() {

		init = function(){

			var id = $('#<?php echo $model ?>Id').val();
			var mapTime;

			loadMedia = function(action){

				switch(action){
					case 'reload':
						$('#admin-modal').modal('hide');
						loadMedia();
						break;
					default:
						loader('#media', 'mediaLoader');
						$('#media').load('/admin/media/insert/model:<?php echo $model ?>/<?php echo $model_url ?>_id:'+id, function(){
							$('#media .btn').click(function(){
								loader('#media', 'mediaLoader');
								$.ajax({
									url:$(this).attr('href'),
									success:function(){
										loaderDelete('mediaLoader');
										loadMedia();
									}
								})
								return false;
							})
							bind_events();
							loaderDelete('mediaLoader');
						});
						$('#media').show();
				}
			}

			loadFiles = function(action){
				switch(action){
					case 'reload':
						$('#admin-modal').modal('hide');
						loadFiles();
						break;
					default:
						loader('#files', 'filesLoader');
						$('#files').load('/admin/files/insert/model:<?php echo $model ?>/<?php echo $model_url ?>_id:'+id, function(){
							$('#files .btn-ajax').click(function(){
								loader('#files', 'filesLoader');
								$.ajax({
									url:$(this).attr('href'),
									success:function(response){
										loaderDelete('filesLoader');
										loadFiles();
									}
								})
								return false;
							})
							bind_events();
							loaderDelete('filesLoader');
						});
						$('#files').show();
				}
			}

			//loadMedia();
			loadFiles();
			loadMedia();

		}

		<?php if(empty($this->request->data[$model]['id'])): ?>
		$.ajax({
			url:"<?php echo Router::url(array('controller' => $controller, 'action' => 'add')) ?>",
			dataType:'json',
			type:'get',
			success: function( response ){
				if(response.id.length){
					$('#<?php echo $model ?>Id').val( response.id );
					init();
				}
			}
		});
		<?php else: ?>
		init();
		<?php endif; ?>

	});

	</script>