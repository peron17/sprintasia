<?php  
$mymodel = substr($this->modelClass, 1, (strlen($this->modelClass) - 1));
?>
<?php echo "<?php "; ?>$this->top_title = <?php echo "'".$mymodel."';\n"; ?>
<?php echo "<?php "; ?>$this->page_title = <?php echo "'".$mymodel."';\n"; ?>
<?php echo "<?php "; ?>$this->page_icon = 'fa fa-folder';<?php echo "\n"; ?>
<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'<i class="fa fa-plus"></i>&nbsp;Create', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-default modal-sm-show', 'title'=>'Add <?php echo $mymodel ?>')),
);
<?php echo "?>\n"; ?>

<div class="box box-solid">
	<div class="box-body">
		<div class="box-body">
		<?php echo "<?php \n"; ?>
		$this->widget('zii.widgets.grid.CGridView', array(
			'id' 			=> '<?php echo $this->class2id($this->modelClass); ?>-grid',
			'dataProvider'	=> $model->search(),
			'filter'		=> $model,
			'itemsCssClass'	=> 'table table-bordered table-striped',
			'columns'		=> array(
				array(
	                'header' => 'No',
	                'value' => '$row + ($this->grid->dataProvider->pagination->currentPage
	                    * $this->grid->dataProvider->pagination->pageSize) + 1',
					'htmlOptions'=>array('width'=>'50'),
	            ),
				<?php 
				foreach($this->tableSchema->columns as $column)
				{
					echo "\t\t\t'".$column->name."',\n";
				}
				?>
				array(
					'class'=>'CButtonColumn',
					'htmlOptions'=>array('width'=>'70'),
					'template'=>'{view}&nbsp;{edit}&nbsp;{deletea}',
					'header'=>'Actions',
					'buttons'=>array(
						'view'=>array(
							'label'=>'<span class="btn btn-xs btn-default"><i class="fa fa-search"></i><span>',
							'options' => array('title'=>'View'),
							'imageUrl'=>false,
						),
						'edit'=>array(
							'label'=>'<span class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></span>span>',
							'options' => array('title'=>'Edit <?php echo $mymodel ?>','class'=>'modal-sm-show edit'),
							'imageUrl'=>false,
							'url'=>'Yii::app()->createUrl("<?php echo $mymodel ?>/update",array("id"=>$data-><?php echo $this->tableSchema->primaryKey; ?>))'
						),
						'deletea'=>array(
							'label'=>'<span class="btn btn-xs btn-warning"><i class="fa fa-eraser"></i></span>',
							'options' => array('title'=>'Delete','data-grid'=>'<?php echo $this->class2id($this->modelClass); ?>-grid','class'=>'btn-delete'),
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
	</div> <!-- end of box-body -->
</div> <!-- end of box -->