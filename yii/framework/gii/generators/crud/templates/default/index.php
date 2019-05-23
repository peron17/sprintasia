<?php echo "<?php \n"; ?>$this->page_title = <?php echo "'".$this->modelClass."';\n"; ?>

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-square"></i>&nbsp;CREATE', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-info')),
);
<?php echo "?>\n"; ?>

<div class="box box-solid">
	<div class="box-body">
	<?php echo "<?php \n"; ?>
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' 			=> '<?php echo $this->class2id($this->modelClass); ?>-grid',
		'dataProvider'	=> $model->search(),
		'filter'		=> $model,
		'itemsCssClass'	=> 'table table-bordered table-hover',
		'columns'		=> array(
		<?php 
		foreach($this->tableSchema->columns as $column)
		{
			echo "\t\t\t'".$column->name."',\n";
		}
		?>
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
						'url'=>'Yii::app()->createUrl("<?php echo strtolower($this->modelClass) ?>/update",array("id"=>$data-><?php echo $this->tableSchema->primaryKey; ?>))'
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