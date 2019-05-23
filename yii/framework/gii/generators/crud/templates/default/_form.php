<div class="box box-solid">
<?php echo "<?php "; ?>
$form = $this->beginWidget('CActiveForm', array(
			'id'=>'<?php echo $this->class2id($this->modelClass); ?>-form',	
			'enableAjaxValidation'=>false,	
		));
<?php echo "?>\n"; ?>

	<div class="box-body">

		<p class="note">Fields with <span class="required">*</span> are required.</p>
		
		<div class="row">
		<?php
		foreach($this->tableSchema->columns as $column)
		{
			if($column->autoIncrement)
				continue;
		?>
			<div class="col-md-12">
				<div class="form-group">
					<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
					<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
					<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
				</div>
			</div>		

		<?php
		}
		?>
		</div>
	</div>
	<div class="box-footer" style="text-align: right;">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>\n"; ?>
	</div>

<?php echo "<?php "; ?>$this->endWidget(); <?php echo "?> \n"; ?>
</div>