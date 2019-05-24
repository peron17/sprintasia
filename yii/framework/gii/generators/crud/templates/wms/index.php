<?php
/**
 * The following variables are available in this template:
 * - $this: Tommypria
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-square"></i>', 'url'=>array('create'), 'class'=>'btn btn-info'),
);
?>