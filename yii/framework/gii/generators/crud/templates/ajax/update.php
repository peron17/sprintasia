<?php echo "<?php "; ?>$form = $this->beginWidget('CActiveForm', array(
	'id'=>'<?php echo strtolower($this->modelClass); ?>-form',	
	'action'=>Yii::app()->createUrl('<?php echo strtolower( substr($this->modelClass, 1, (strlen($this->modelClass) - 1))) ?>/edit', array('id'=>$model-><?php echo $this->tableSchema->primaryKey ?>)),
	'enableAjaxValidation'=>true,	
));<?php echo " ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>
<?php
}
?>

<?php echo "<?php "; ?>$this->endWidget(); <?php echo "?>"; ?>