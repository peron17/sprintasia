<?php $this->page_title = 'Detail MBrand #'.$model->code;

$this->breadcrumbs=array(
	'Mbrands'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-edit"></i>&nbsp;EDIT', 'url'=>array('update','id'=>$model->code), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-plus"></i>&nbsp;CREATE', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-eraser"></i>&nbsp;DELETE', 'url'=>array('delete','id'=>$model->code), 'linkOptions'=>array('class'=>'btn btn-danger','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-th"></i>&nbsp;MANAGE', 'url'=>array('index'), 'linkOptions'=>array('class'=>'btn btn-info')),
);
?>

<div class="box box-solid">
	<div class="box-body">
		<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'		 => $model,
			'attributes' => array(
				'code',
		'name',
			),
		));
		?>
	</div>
</div>