<?php 
$this->page_title = 'MBrand';

$this->breadcrumbs=array(
	'Mbrands',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-square"></i>&nbsp;CREATE', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-info')),
);
?>

<div class="box box-solid">
	<div class="box-body">
	<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' 			=> 'mbrand-grid',
		'dataProvider'	=> $model->search(),
		'filter'		=> $model,
		'itemsCssClass'	=> 'table table-bordered table-hover',
		'columns'		=> array(
					'code',
			'name',
			array(
				'class'=>'CButtonColumn',
				'htmlOptions'=>array('width'=>'70'),
				'template'=>'{view}&nbsp;&nbsp;{edit}&nbsp;&nbsp;{delete}',
				'header'=>'Actions',
				'buttons'=>array(
					'view'=>array(
						'label'=>'<i class="fa fa-search"></i>',
						'options' => array('title'=>'View'),
						'imageUrl'=>false,
					),
					'edit'=>array(
						'label'=>'<i class="fa fa-edit"></i>',
						'options' => array('title'=>'Edit'),
						'imageUrl'=>false,
						'url'=>'Yii::app()->createUrl("mbrand/update",array("id"=>$data->code))'
					),
					'delete'=>array(
						'label'=>'<i class="fa fa-eraser"></i>',
						'options' => array('title'=>'Delete'),
						'imageUrl'=>false,
					),
				),
			),
		),
		'pager'=>array(
			'cssFile'=>false,
			'header'=>false,
			'htmlOptions'=>array(
				'class'=>'pagination pagination-sm no-margin pull-right'
			),
		),
	)); ?>
	</div> <!-- end of box-body -->
</div> <!-- end of box -->