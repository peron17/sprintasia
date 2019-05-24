<?php $this->page_title = 'Edit MBrand #'.$model->code;

$this->breadcrumbs=array(
	'Mbrands'=>array('index'),
	$model->name=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-search"></i>&nbsp;VIEW', 'url'=>array('view','id'=>$model->code), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-plus"></i>&nbsp;CREATE', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-eraser"></i>&nbsp;DELETE', 'url'=>array('delete','id'=>$model->code), 'linkOptions'=>array('class'=>'btn btn-danger','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-th"></i>&nbsp;MANAGE', 'url'=>array('index'), 'linkOptions'=>array('class'=>'btn btn-info')),
);

$this->renderPartial('_form', array('model'=>$model));
?>