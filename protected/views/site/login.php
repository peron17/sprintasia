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
    <?php
        if(Yii::app()->user->hasFlash('success'))
            echo '<div class="alert alert-success alert-dismissable">';
        elseif(Yii::app()->user->hasFlash('error'))
            echo '<div class="alert alert-danger alert-dismissable">';
        elseif(Yii::app()->user->hasFlash('warning'))
            echo '<div class="alert alert-warning alert-dismissable">';
        elseif(Yii::app()->user->hasFlash('info'))
            echo '<div class="alert alert-info alert-dismissable">';

        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
              if($key == 'success')
                echo "<i class='fa fa-check'></i>";
              elseif($key == 'error')
                echo "<i class='fa fa-ban'></i>";
              elseif($key == 'warning')
                echo "<i class='fa fa-exclamation'></i>";
              elseif($key == 'info')
                echo "<i class='fa fa-comment'></i>";

                echo   '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <b>'.$key.'!&nbsp;&nbsp;</b>
                        '.$message;
            }
            echo '</div>';
        }
    ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'htmlOptions'=>['class'=>'form-signin'],
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    <?php $this->endWidget(); ?>

    <?php $getCs->registerScriptFile($baseUrl.'/js/bootstrap.min.js'); ?>
</body>
</html>