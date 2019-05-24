<?php

class ApiController extends Controller
{
	public function actionMobil($brand='', $type='')
	{
		$data = [];

		$criteria = new CDbCriteria;
		$criteria->alias = 't';
		$criteria->join = "join m_brand_type bt on t.type = bt.id join m_brand b on bt.brand = b.code";
		$criteria->select = "t.chassis_number, t.police_number, t.year, bt.name as type, b.name as brand";

		if(isset($_GET))
		{
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
		elseif(isset($_POST))
		{
			$chassis 	= $_POST['nomor_kerangka'];
			$police 	= $_POST['nomor_polisi'];
			$type 		= $_POST['tipe_id'];
			$year 		= $_POST['tahun'];

			$model = new MChassis;
			$model->chassis_number = $chassis;
			$model->police_number = $police;
			$model->tipe = $type;
			$model->year = $year;
			header('Content-Type: application/json; charset=UTF-8');
			if($model->save())
				echo json_encode(['status'=>'Success']);
			else
				echo json_encode(['status'=>'Failed']);
		}

	}

	public function actionTipe()
	{
		$criteria = new CDbCriteria;
		$criteria->alias = "t";
		$criteria->join = "join m_brand b on t.brand = b.code";
		// $criteria->select = "t.id, t.name as tipe, b.name";
		$model = MBrandType::model()->findAll($criteria);
		$data = [];
		foreach($model as $r)
		{
			$data[] = [
				'tipe_id' => $r->id,
				'tipe' => $r->name,
				'merk' => $r->brand,
				'merk_name' => $r->brands->name
			];
		}
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($data);
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