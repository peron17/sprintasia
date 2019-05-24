<?php echo "<?php "; ?>$this->page_title = 'Edit <?php echo $this->modelClass; ?> #'.$model-><?php echo $this->tableSchema->primaryKey.";\n"; ?>

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'<i class="fa fa-search"></i>&nbsp;VIEW', 'url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-plus"></i>&nbsp;CREATE', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-info','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-eraser"></i>&nbsp;DELETE', 'url'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'linkOptions'=>array('class'=>'btn btn-danger','style'=>'margin-right:10px;')),
	array('label'=>'<i class="fa fa-th"></i>&nbsp;MANAGE', 'url'=>array('index'), 'linkOptions'=>array('class'=>'btn btn-info')),
);

$this->renderPartial('_form', array('model'=>$model));
?>