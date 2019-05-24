<?php

class MobilController extends Controller
{
	public function actionCreate()
	{
		$model = new MChassis;

		$this->performAjaxValidation($model);

		if(isset($_POST['MChassis']))
		{
			$model->attributes = $_POST['MChassis'];

			if($model->save())
			{
				Yii::app()->user->setFlash('success', "Data berhasil ditambahkan"); 
				$this->redirect(['mobil/index']);
			} else {
				Yii::app()->user->setFlash('error', "Data gagal ditambahkan"); 
			}
		}

		$this->render('create', [
			'model' => $model
		]);
	}

	public function actionUpdate($id)
	{
		$model = MChassis::model()->findByPk($id);
		$model->brand = $model->types->brands->code;
		$model->type = $model->types->id;

		$this->performAjaxValidation($model);

		if(isset($_POST['MChassis']))
		{
			$model->attributes = $_POST['MChassis'];

			if($model->save())
			{
				Yii::app()->user->setFlash('success', "Data berhasil diperbarui"); 
				$this->redirect(['mobil/index']);
			} else {
				Yii::app()->user->setFlash('error', "Data gagal diperbarui"); 
			}
		}

		$this->render('update', [
			'model' => $model
		]);
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('list'));
	}

	public function actionGettype()
	{
		if(isset($_POST))
		{
			$id = $_POST['id'];
			$model = MBrandType::model()->findAll(['condition'=>"brand = '$id'"]);

			echo "<option></option>";
			foreach($model as $val){
				echo '<option value="'.$val->id.'">'.$val->name.'</option>';
			}
		}
	}

	public function actionList()
	{
		$model = MChassis::model()->findAll();
		// $data = $model->getDataChassis();

		$this->render('index', [
			'model' => $model
		]);
	}

	/*------------------API------------------ */
	public function actionIndex($brand='', $type='')
	{
		echo $brand;
		echo $type;
	}
	/*------------------/ API------------------ */

	public function loadModel($id)
	{
		$model=MChassis::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MChassis $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mchassis-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}