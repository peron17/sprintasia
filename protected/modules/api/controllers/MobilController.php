<?php

class MobilController extends Controller
{
	public function actionIndex($brand='', $type='')
	{
		$data = [];

		$criteria = new CDbCriteria;
		$criteria->alias = 't';
		$criteria->join = "join m_brand_type bt on t.type = bt.id join m_brand b on bt.brand = b.code";
		$criteria->select = "t.chassis_number, t.police_number, t.year, bt.name as type, b.name as brand";

		if($brand!='' && $type!='')
			$criteria->addCondition("lower(b.code)='".strtolower($brand)."' and lower(bt.name)='".strtolower($type)."'");
		elseif($brand!='')
			$criteria->addCondition("lower(b.code)='".strtolower($brand)."'");

		$model = MChassis::model()->findAll($criteria);
		foreach($model as $a)
		{
			$data[] = [
				'nomor_kerangka' => $a->chassis_number,
				'nomor_polisi' => $a->police_number,
				'merk' => $a->brand,
				'tipe' => $a->type,
				'year' => $a->year
			];
		}

		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($data);
	}

	public function actionCreate()
	{
		header('Content-Type: application/json; charset=UTF-8');
		if(isset($_POST))
		{
			$chassis 	= $_POST['nomor_kerangka'];
			$police 	= $_POST['nomor_polisi'];
			$type 		= $_POST['tipe_id'];
			$year 		= $_POST['tahun'];

			$model = new MChassis;
			$model->chassis_number = $chassis;
			$model->police_number = $police;
			$model->type = $type;
			$model->year = $year;
			if($model->save())
				echo json_encode(['status'=>'Success']);
			else
				echo json_encode(['status'=>'Failed']);
		}
		else
			echo json_encode(['status'=>'Invalid Method']);
	}

	public function actionUpdate()
	{
		header('Content-Type: application/json; charset=UTF-8');
		if(isset($_POST))
		{
			$id 		= $_POST['id'];
			$chassis 	= $_POST['nomor_kerangka'];
			$police 	= $_POST['nomor_polisi'];
			$type 		= $_POST['tipe_id'];
			$year 		= $_POST['tahun'];

			$model = MChassis::model()->findByPk($id);
			$model->chassis_number = $chassis;
			$model->police_number = $police;
			$model->type = $type;
			$model->year = $year;
			if($model->save())
				echo json_encode(['status'=>'Success']);
			else
				echo json_encode(['status'=>'Failed']);
		}
		else
			echo json_encode(['status'=>'Invalid Method']);
	}

	public function actionDelete($id)
	{
		header('Content-Type: application/json; charset=UTF-8');
		$model = MChassis::model()->findByPk($id);
		if($model->delete())
			echo json_encode(['status'=>'Success']);
		else
			echo json_encode(['status'=>'Failed']);
	}
}