<div class="container">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<form id="form-search">
				<div class="form-row">
					<div class="form-group col-md-5">
						<select class="form-control" id="criteria">
							<option>- Search Criteria -</option>
							<option value="kerangka">Nomor Kerangka</option>
							<option value="polisi">Nomor Polisi</option>
							<option value="merk">Merk</option>
							<option value="tipe">Tipe</option>
							<option value="tahun">Tahun</option>
						</select>
					</div>
					<div class="col-md-7">
						<div class="input-group mb3">
							<input type="text" class="form-control" id="key" placeholder="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-secondary" id="btn-search" type="button">Search!</button>
							</div>
						</div>
					</div>
				</div>
			</form>
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

	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nomor Kerangka</th>
				<th>Nomor Polisi</th>
				<th>Merek</th>
				<th>Tipe</th>
				<th>Tahun</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $total = 0; ?>
		<?php foreach($model as $d): ?>
			<tr>
				<td><?= $d->chassis_number ?></td>
				<td><?= $d->police_number ?></td>
				<td><?= $d->types->brands->name ?></td>
				<td><?= $d->types->name ?></td>
				<td><?= $d->year ?></td>
				<td>
					<a href="<?= Yii::app()->createUrl('mobil/update', ['id'=>$d->chassis_number]) ?>" class="btn btn-sm btn-warning">Edit</a>
					<a href="<?= Yii::app()->createUrl('mobil/delete', ['id'=>$d->chassis_number]) ?>" class="btn btn-sm btn-danger">Delete</a>
				</td>
			</tr>
			<?php $total++; ?>
		<?php endforeach ?>
		</tbody>
	</table>

	<div class="row">
		<div class="col-md-10">
			Total Mobil : <?= $total ?>
		</div>
		<div class="col-md-2" style="text-align: right;">
			<a href="<?= Yii::app()->createUrl('mobil/create') ?>" class="btn btn-sm btn-success btn-add">Tambah Mobil</a>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	let table = $('#datatable').DataTable({
		'searching'		: false, 
		'info' 			: false,
		'paging' 		: false
	} );

	let form_search = $('#form-search');

	$('#btn-search').click(function(e){
		e.preventDefault();

		
	});
});
</script>