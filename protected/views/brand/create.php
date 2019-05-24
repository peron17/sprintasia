<?php 
$this->page_title = 'Create MBrand';

$this->breadcrumbs=array(
	'Mbrands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-th"></i>&nbsp;MANAGE', 'url'=>array('index'), 'linkOptions'=>array('class'=>'btn btn-info')),
);

$this->renderPartial('_form', array('model'=>$model));
?>
