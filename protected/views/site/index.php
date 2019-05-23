<div class="container">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<form id="form-search">
				<div class="form-row">
					<div class="form-group col-md-5">
						<select class="form-control">
							<option>- Search Criteria -</option>
							<option value="01">Nomor Kerangka</option>
							<option value="02">Nomor Polisi</option>
							<option value="02">Merk</option>
							<option value="02">Tipe</option>
							<option value="02">Tahun</option>
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
	</table>
</div>
<script>
$(document).ready(function(){
	$('#datatable').DataTable( {
		'ajax'	: {
			'url' : '<?= Yii::app()->createUrl('mobil/getdata') ?>',
			'dataSrc' : 'data'
		},
		'columns' 	: [
			{ 'data': 'nomor_kerangka'},
			{ 'data': 'nomor_polisi'},
			{ 'data': 'merek'},
			{ 'data': 'tipe'},
			{ 'data': 'tahun'},
			{ 'data': 'aksi'}
		]
	} );
});
</script>
<?php Yii::app()->clientScript->registerScript('dt',"
	// $('#datatable').DataTable( {
 //        'ajax': '".Yii::app()->createUrl('mobil/getdata')."',
 //        'columns': [
 //            { 'data': 'nomor_kerangka' },
 //            { 'data': 'nomor_polisi' },
 //            { 'data': 'merek' },
 //            { 'data': 'tipe' },
 //            { 'data': 'tahun' },
 //            { 'data': 'aksi' }
 //        ]
 //    } );
	
	// $('#datatable').DataTable({
	// 	'searching'		: false, 
	// 	'info' 			: false,
	// 	'paging' 		: false,
	// 	'processing' 		: true,
 //        'serverSide' 		: true,
	// 	'ajax' 		: {
	// 		'url' : '".Yii::app()->createUrl('mobil/getdata')."',
	// 		'dataSrc' : ''
	// 	},
	// 	'columns' 	: [
	// 		{ 'data': 'nomor_kerangka'},
	// 		{ 'data': 'nomor_polisi'},
	// 		{ 'data': 'merek'},
	// 		{ 'data': 'tipe'},
	// 		{ 'data': 'tahun'},
	// 		{ 'data': 'aksi'}
	// 	]
	// });
") ?>