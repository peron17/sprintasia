<!DOCTYPE html>
<html>
<head>
    <title><?= Yii::app()->name ?> | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php  
    $baseUrl  = Yii::app()->theme->baseUrl;
    $getCs    = Yii::app()->getClientScript();

    $getCs->registerCssFile($baseUrl.'/css/dataTables.bootstrap4.min.css');
    /* Bootstrap 3.3.7 */
    $getCs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    /* CSS */
    $getCs->registerCssFile($baseUrl.'/css/style.css');
    ?>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"><?= Yii::app()->name ?></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            Hello, Sutiyoso
        </nav>
        <a class="btn btn-sm btn-danger" href="<?= Yii::app()->createUrl('site/logout') ?>">Logout</a>
    </div>
    <?php echo $content; ?>
    
    <?php $getCs->registerScriptFile($baseUrl.'/js/dataTables.bootstrap4.min.js'); ?>
    <?php $getCs->registerScriptFile($baseUrl.'/js/jquery.dataTables.min.js'); ?>
    <?php $getCs->registerScriptFile($baseUrl.'/js/bootstrap.min.js'); ?>
</body>
</html>