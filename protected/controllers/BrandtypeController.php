<?php

class BrandtypeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	/*public $layout='//layouts/column2';*/

	/**
	 * @return array action filters
	 */
	/* public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	} */

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/* public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	} */

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		/*if(!Yii::app()->user->checkAccess('mbrandtype.index'))
			throw new CHttpException(403, 'Not Authorized');*/

		$model=new MBrandType('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['MBrandType']))
			$model->attributes=$_GET['MBrandType'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		/*if(!Yii::app()->user->checkAccess('mbrandtype.create'))
			throw new CHttpException(403, 'Not Authorized');*/

		$model=new MBrandType;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['MBrandType']))
		{
			$model->attributes=$_POST['MBrandType'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "Data berhasil ditambahkan"); 
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		/*if(!Yii::app()->user->checkAccess('mbrandtype.view'))
			throw new CHttpException(403, 'Not Authorized');*/

		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		/*if(!Yii::app()->user->checkAccess('mbrandtype.update'))
			throw new CHttpException(403, 'Not Authorized');*/
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MBrandType']))
		{
			$model->attributes=$_POST['MBrandType'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "Data berhasil diperbarui"); 
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		/*if(!Yii::app()->user->checkAccess('mbrandtype.delete'))
			throw new CHttpException(403, 'Not Authorized');*/

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MBrandType the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MBrandType::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MBrandType $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mbrand-type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
