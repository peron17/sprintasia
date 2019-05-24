<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php  
	$myclass = substr($this->controllerClass, 1, (strlen($this->controllerClass) - 1));
	$myclass = ucwords($myclass);
?>
<?php echo "<?php\n"; ?>

class <?php echo $myclass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		/*if(!Yii::app()->user->checkAccess('<?php echo strtolower($this->modelClass); ?>.index'))
			throw new CHttpException(403, 'Not Authorized');*/

		$model = new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes=$_GET['<?php echo $this->modelClass; ?>'];

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
		if(Yii::app()->request->isAjaxRequest)
		{
			Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;

			$this->layout = "clear";

			$model = new <?php echo $this->modelClass; ?>;

			$this->render('create', [
				'model' => $model
			]);

			exit;
		}
		else
			throw new CHttpException('403','Forbidden Access.');
	}

	public function actionAdd()
	{	
		$status = 'error';
		$message = "New Data Added";
		
		$model = new <?php echo $this->modelClass; ?>;

		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo strtolower($this->modelClass); ?>-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];

			if($model->validate() && $model->save())
				$status = 'success';
			else
				$message = "Failed";
		}

		echo json_encode(array('status'=>$status, 'message'=>$message));

		Yii::app()->end();	
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		/*if(!Yii::app()->user->checkAccess('<?php echo strtolower($this->modelClass); ?>.view'))
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
		if(Yii::app()->request->isAjaxRequest)
		{
			Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;

			$this->layout = "clear";

			$model = <?php echo $this->modelClass; ?>::model()->findByPk($id);

			$this->render('update', [
				'model' => $model
			]);

			exit;
		}
		else
			throw new CHttpException('403','Forbidden Access.');
	}

	public function actionEdit($id)
	{
		$status = 'error';
		$message = "Data Updated";
		
		$model = <?php echo $this->modelClass; ?>::model()->findByPk($id);

		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo strtolower($this->modelClass); ?>-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];

			if($model->validate() && $model->update())
				$status = 'success';
			else
				$message = "Failed";
		}

		echo json_encode(array('status'=>$status, 'message'=>$message));

		Yii::app()->end();	
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		/*if(!Yii::app()->user->checkAccess('<?php echo strtolower($this->modelClass); ?>.delete'))
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
	 * @return <?php echo $this->modelClass; ?> the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=<?php echo $this->modelClass; ?>::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param <?php echo $this->modelClass; ?> $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
