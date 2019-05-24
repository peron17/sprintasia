<div class="container">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<form id="form-search">
				<div class="form-row">
					<div class="form-group col-md-5">
						<select class="form-control">
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
							<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-secondary" id="btn-search" type="button">Search!</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

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
					<button class="btn btn-sm btn-warning">Edit</button>
					<button class="btn btn-sm btn-danger">Delete</button>
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
			<a href="" class="btn btn-sm btn-success btn-add">Tambah Mobil</a>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#datatable').DataTable( {
		'searching'		: false, 
		'info' 			: false,
		'paging' 		: false
	} );
});
</script>