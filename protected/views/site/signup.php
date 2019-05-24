<!DOCTYPE html>
<html>
<head>
    <title><?= Yii::app()->name ?> | Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php  
    $baseUrl  = Yii::app()->theme->baseUrl;
    $getCs    = Yii::app()->getClientScript();

    /* Bootstrap 3.3.7 */
    $getCs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    /* CSS */
    $getCs->registerCssFile($baseUrl.'/css/login.css');
    ?>
</head>
<body class="text-center">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'form-signup',
        'enableAjaxValidation'=>false
    )); ?>
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <div class="form-group">
            <label for="username" class="sr-only">Username</label>
            <?= $form->textField($model,'username',array('size'=>30,'maxlength'=>30, 'class'=>'form-control', 'placeholder'=>'Username')); ?>
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <?= $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Password')); ?>
        </div>
        <div class="form-group">
            <label for="full_name" class="sr-only">Full name</label>
            <?= $form->textField($model,'full_name',array('size'=>30,'maxlength'=>30, 'class'=>'form-control', 'placeholder'=>"Full Name")); ?>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    <?php $this->endWidget(); ?>

    <?php $getCs->registerScriptFile($baseUrl.'/js/bootstrap.min.js'); ?>
</body>
</html>