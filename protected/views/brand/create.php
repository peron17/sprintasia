<div class="row">
	<div class="col-md-6">
		<h5>Merk</h5>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<a href="<?= Yii::app()->createUrl('brand/index') ?>" class="btn btn-sm btn-success">Manage</a>
	</div>
</div>
<?php 
$this->renderPartial('_form', array('model'=>$model));
?>
