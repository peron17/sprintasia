<div class="box box-solid">
<?php $form = $this->beginWidget('CActiveForm', array(
			'id'=>'mbrand-type-form',	
			'enableAjaxValidation'=>false,	
		));
?>

	<div class="box-body">

		<p class="note">Fields with <span class="required">*</span> are required.</p>
		
		<div class="row">
					<div class="col-md-12">
				<div class="form-group">
					<?php echo $form->labelEx($model,'brand'); ?>
					<?= $form->dropDownList($model,'brand',CHtml::listData(MBrand::model()->findAll(),'code','name'),['class'=>'form-control','empty'=>'']) ?>
					<?php echo $form->error($model,'brand'); ?>
				</div>
			</div>		

					<div class="col-md-12">
				<div class="form-group">
					<?php echo $form->labelEx($model,'name'); ?>
					<?php echo $form->textField($model,'name',array('size'=>16,'maxlength'=>16, 'class'=>'form-control')); ?>
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