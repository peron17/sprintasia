<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(Yii::app()->user->isGuest)
			$this->redirect(array('site/login'));
		else
			$this->redirect(array('mobil/index'));

		// $this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		/*if(!Yii::app()->user->isGuest)
		{
			$this->redirect(array('site/index'));
			Yii::app()->end();
		}*/

		if(!Yii::app()->user->isGuest)
			$this->redirect(array('site/index'));

		$this->layout = '//layouts/clean';

		$model 	= new LoginForm;

		// collect user input data
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
                        Yii::app()->end();
		}
			
		if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            
            if($model->validate() && $model->login())
            {
				$this->redirect(Yii::app()->user->returnUrl);            
            }
        }


		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionSignup()
	{
		$this->layout = '//layouts/clean';

		$model = new SUser;

		$this->performAjaxValidation($model, 'form-signup');

		if(isset($_POST['SUser']))
		{
			$model->attributes = $_POST['SUser'];
			$model->password = password_hash($model->password, PASSWORD_BCRYPT);
			$model->active = 'Y';
			$model->created_at = date('Y-m-d H:i:s');

			if($model->save())
				$this->redirect(['site/login']);
		}

		$this->render('signup', ['model' => $model]);
	}

	public function actionResetpassword()
	{
		$this->layout = '//layouts/clean';

		$model = new FormReset;
		$model->scenario = 'send_link';

		// collect user input data
		if(isset($_POST['ajax']) && $_POST['ajax']==='reset-form')
		{
			echo CActiveForm::validate($model);
                        Yii::app()->end();
		}

		if(isset($_POST['FormReset']))
        {
            $model->attributes=$_POST['FormReset'];
            
            if($model->validate() && $model->sendLink())
            {
            	Yii::app()->user->setFlash('success', 'Link has been sent to your email');
            	$this->redirect(array('site/login'));
            }
        }

		$this->render('reset',array('model'=>$model));
	}

	public function actionReset($selector, $validator)
	{
		$this->layout = '//layouts/clean';

		$model = new FormReset;
		$model->scenario = 'reset_form';
		$model->selector = $selector;
		$model->validator = $validator;

		$this->performAjaxValidation($model, 'reset-password-form');

		if(isset($_POST['FormReset']))
		{
			$model->attributes = $_POST['FormReset'];

			if($model->validate())
			{
				$reset = $model->reset();
				if($reset['status'] == true)
				{
					Yii::app()->user->setFlash('success', $reset['message']);
            		$this->redirect(array('site/login'));
				}
				else
					Yii::app()->user->setFlash('error', $reset['message']);

			}
		}

		$this->render('form_reset_password', array(
			'model'=>$model,
		));
	}	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();

		$this->redirect(Yii::app()->homeUrl);
	}

	protected function performAjaxValidation($model, $form)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$form)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}