<?php echo "<?php \n"; ?>
$this->page_title = <?php echo "'Create ".$this->modelClass."';\n"; ?>

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'<i class="fa fa-th"></i>&nbsp;MANAGE', 'url'=>array('index'), 'linkOptions'=>array('class'=>'btn btn-info')),
);
<?php echo "\n"; ?>
$this->renderPartial('_form', array('model'=>$model));
?>
