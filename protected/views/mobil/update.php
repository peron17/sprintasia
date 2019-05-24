<div class="container">
	<div class="row">
		<div class="col-md-12" style="text-align: right;">
			<a href="<?= Yii::app()->createUrl('mobil/create') ?>" class="btn btn-sm btn-success">Create</a>
			<a href="<?= Yii::app()->createUrl('mobil/index') ?>" class="btn btn-sm btn-success">Home</a>
		</div>
	</div><br>
	<div class="card">
		<div class="card-header">
			Memperbarui Data Mobil <b>#<?= $model->chassis_number ?></b>
		</div>
		<div class="card-body">
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id'=>'mchassis-form',	
				'enableAjaxValidation'=>false
			)); ?>
			<div class="form-row">
				<div class="form-group col-md-6">
					<?= $form->labelEx($model,'chassis_number'); ?>
					<?= $form->textField($model,'chassis_number',array('size'=>40,'maxlength'=>40, 'class'=>'form-control')); ?>
					<?= $form->error($model,'chassis_number'); ?>
				</div>
				<div class="form-group col-md-6">
					<?= $form->labelEx($model,'police_number'); ?>
					<?= $form->textField($model,'police_number',array('size'=>8,'maxlength'=>8, 'class'=>'form-control')); ?>
					<?= $form->error($model,'police_number'); ?>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<?= $form->labelEx($model,'brand'); ?>
					<?= $form->dropDownList($model,'brand',CHtml::listData(MBrand::model()->findAll(),'code','name'),['class'=>'form-control','empty'=>'']) ?>
					<?= $form->error($model,'brand'); ?>
				</div>
				<div class="form-group col-md-4">
					<?= $form->labelEx($model,'type'); ?>
					<?= $form->dropDownList($model,'type',CHtml::listData(MBrandType::model()->findAll(),'id','name'),['class'=>'form-control','empty'=>'']) ?>
					<?= $form->error($model,'type'); ?>
				</div>
				<div class="form-group col-md-4">
					<?= $form->labelEx($model,'year'); ?>
					<?= $form->textField($model,'year',array('size'=>8,'maxlength'=>8, 'class'=>'form-control')); ?>
					<?= $form->error($model,'year'); ?>
				</div>
			</div>
			<button type="submit" class="btn btn-success">Save</button>
			<?php $this->endWidget(); ?> 
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#MChassis_brand').change(function(){
		let type = $('#MChassis_type'),
			id = $(this).val();

		$.ajax({
			url : '<?= Yii::app()->createUrl('mobil/gettype') ?>',
			method : 'post',
			data : {id : id},
			success : function(r) {
				type.html(r);
			},
			error : function(e) {
				alert('Failed to retrieve');
			}
		});
	});
});
</script>