<?php

class MobilController extends Controller
{
	public function actionGetdata()
	{
		// echo '
		// {
		//   "data": [
		//     {
		//       "id": "1",
		//       "nomor_kerangka": "Tiger Nixon",
		//       "nomor_polisi": "System Architect",
		//       "merek": "$320,800",
		//       "tipe": "2011/04/25",
		//       "tahun": "Edinburgh",
		//       "aksi": "5421"
		//     },
		//     {
		//       "id": "2",
		//       "nomor_kerangka": "Garrett Winters",
		//       "nomor_polisi": "Accountant",
		//       "merek": "$170,750",
		//       "tipe": "2011/07/25",
		//       "tahun": "Tokyo",
		//       "aksi": "8422"
		//     }
		// ]}
		// ';
		$data = [
			'nomor_kerangka'	=> '12345678',
			'nomor_polisi'	=> 'B 1234 BCD',
			'merek'	=> 'Toyota',
			'tipe'	=> 'Avanza',
			'tahun'	=> '2012',
			'aksi'	=> '?',
		];

		echo json_encode(['data'=>$data]);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}