<div class="box box-solid">
<?php $form = $this->beginWidget('CActiveForm', array(
			'id'=>'mbrand-form',	
			'enableAjaxValidation'=>false,	
		));
?>

	<div class="box-body">

		<p class="note">Fields with <span class="required">*</span> are required.</p>
		
		<div class="row">
					<div class="col-md-12">
				<div class="form-group">
					<?php echo $form->labelEx($model,'code'); ?>
					<?php echo $form->textField($model,'code',array('size'=>12,'maxlength'=>12, 'class'=>'form-control')); ?>
					<?php echo $form->error($model,'code'); ?>
				</div>
			</div>		

					<div class="col-md-12">
				<div class="form-group">
					<?php echo $form->labelEx($model,'name'); ?>
					<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20, 'class'=>'form-control')); ?>
					<?php echo $form->error($model,'name'); ?>
				</div>
			</div>		

				</div>
	</div>
	<div class="box-footer" style="text-align: right;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?> 
</div>