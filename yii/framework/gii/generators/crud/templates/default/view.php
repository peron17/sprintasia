<?php echo "<?php "; ?>$this->page_title = <?php echo "'Detail ".$this->modelClass." #'.\$model->".$this->tableSchema->primaryKey.";\n"; ?>

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'<i class="fa fa-edit"></i>&nbsp;EDIT', 'url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-plus"></i>&nbsp;CREATE', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-eraser"></i>&nbsp;DELETE', 'url'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'linkOptions'=>array('class'=>'btn btn-danger','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-th"></i>&nbsp;MANAGE', 'url'=>array('index'), 'linkOptions'=>array('class'=>'btn btn-info')),
);
?>

<div class="box box-solid">
	<div class="box-body">
		<?php echo "<?php \n"; ?>
		$this->widget('zii.widgets.CDetailView', array(
			'data'		 => $model,
			'attributes' => array(
		<?php  
		foreach($this->tableSchema->columns as $column)
		{
			echo "\t\t'".$column->name."',\n";
		}
		?>
			),
		));
		?>
	</div>
</div>