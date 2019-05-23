<?php
/* @var $this SiteController */
/* @var $error array */

$this->breadcrumbs=array(
	'Error',
);
?>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			<h1 class="error-number"><?php echo $code; ?></h1>
			<p><?php echo CHtml::encode($message); ?></p>
		</div>
	</div>
</div>