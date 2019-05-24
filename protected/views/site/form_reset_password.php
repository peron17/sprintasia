<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Yii::app()->name ?> | Reset Password </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php  
  $baseUrl  = Yii::app()->theme->baseUrl;
  $getCs    = Yii::app()->getClientScript();

  /* Bootstrap 3.3.7 */
  $getCs->registerCssFile($baseUrl.'/bower_components/bootstrap/dist/css/bootstrap.min.css');
  /* Font Awesome */
  $getCs->registerCssFile($baseUrl.'/bower_components/font-awesome/css/font-awesome.min.css');
  /* Ionicons */
  $getCs->registerCssFile($baseUrl.'/bower_components/Ionicons/css/ionicons.min.css');
  /* Theme style */
  $getCs->registerCssFile($baseUrl.'/dist/css/AdminLTE.min.css');
  /* iCheck */
  $getCs->registerCssFile($baseUrl.'/plugins/iCheck/square/blue.css');

  $getCs->registerCss('css','
    .errorMessage { color: #bf0505; font-style: italic; }
  ');
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo Yii::app()->baseUrl; ?>"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
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
    <p class="login-box-msg">Type your new password.</p>

    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'reset-password-form',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
    )); ?>
      <?php echo $form->hiddenField($model,'selector',array()) ?>
      <?php echo $form->hiddenField($model,'validator',array()) ?>
      <div class="form-group has-feedback">
        <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'password'); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $form->passwordField($model,'retype_password',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'retype_password'); ?>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-flat pull-right">Send</button>
        </div>
      </div>
    <?php $this->endWidget(); ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php  
/* jQuery 3 */
$getCs->registerScriptFile($baseUrl.'/bower_components/jquery/dist/jquery.min.js');
/* Bootstrap 3.3.7 */
$getCs->registerScriptFile($baseUrl.'/bower_components/bootstrap/dist/js/bootstrap.min.js');
/* iCheck */
$getCs->registerScriptFile($baseUrl.'/plugins/iCheck/icheck.min.js');

$getCs->registerScript('script',"
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });

    $('#FormReset_password').focus();
  });
");
?>
</body>
</html>