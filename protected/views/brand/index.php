<div class="row">
	<div class="col-md-6">
		<h5>Merk</h5>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<a href="<?= Yii::app()->createUrl('brand/create') ?>" class="btn btn-sm btn-success">Tambah Merk</a>
	</div>
</div>

<?php
    if(Yii::app()->user->hasFlash('success'))
        echo '<div class="alert alert-success alert-dismissable">';
    elseif(Yii::app()->user->hasFlash('error'))
        echo '<div class="alert alert-danger alert-dismissable">';
    elseif(Yii::app()->user->hasFlash('warning'))
        echo '<div class="alert alert-warning alert-dismissable">';
    elseif(Yii::app()->user->hasFlash('info'))
        echo '<div class="alert alert-info alert-dismissable">';

    $flashMessages = Yii::app()->user->getFlashes();
    if ($flashMessages) {
        foreach($flashMessages as $key => $message) {
          if($key == 'success')
            echo "<i class='fa fa-check'></i>";
          elseif($key == 'error')
            echo "<i class='fa fa-ban'></i>";
          elseif($key == 'warning')
            echo "<i class='fa fa-exclamation'></i>";
          elseif($key == 'info')
            echo "<i class='fa fa-comment'></i>";

            echo   '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <b>'.$key.'!&nbsp;&nbsp;</b>
                    '.$message;
        }
        echo '</div>';
    }
?>

<div class="box box-solid">
	<div class="box-body">
	<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' 			=> 'mbrand-grid',
		'dataProvider'	=> $model->search(),
		'filter'		=> $model,
		'itemsCssClass'	=> 'table table-bordered table-striped table-condensed',
		'columns'		=> array(
			'code',
			'name',
			array(
				'class'=>'CButtonColumn',
				'htmlOptions'=>array('width'=>'160'),
				'template'=>'{edit}&nbsp;{delete}',
				'header'=>'Actions',
				'buttons'=>array(
					'edit'=>array(
						'label'=>'<button class="btn btn-sm btn-warning">Edit</button>',
						'options' => array('title'=>'Edit'),
						'imageUrl'=>false,
						'url'=>'Yii::app()->createUrl("brand/update",array("id"=>$data->code))'
					),
					'delete'=>array(
						'label'=>'<button class="btn btn-sm btn-danger">Delete</button>',
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