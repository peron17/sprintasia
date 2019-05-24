<!DOCTYPE html>
<html>
<head>
    <title><?= Yii::app()->name ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php  
    $user = SUser::model()->findByPk(Yii::app()->user->getId());
    $baseUrl  = Yii::app()->theme->baseUrl;
    $getCs    = Yii::app()->getClientScript();

    $getCs->registerCssFile($baseUrl.'/css/dataTables.bootstrap4.min.css');
    /* Bootstrap 3.3.7 */
    $getCs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    /* CSS */
    $getCs->registerCssFile($baseUrl.'/css/style.css');
    $getCs->registerCss('mycss','
        .dataTables_filter { display:none; }
    ');
    ?>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"><?= Yii::app()->name ?></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <span class="nav-user-logged-in">Hello, <?= $user->full_name ?></span>
        </nav>
        <a class="btn btn-sm btn-danger" href="<?= Yii::app()->createUrl('site/logout') ?>">Logout</a>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; margin-bottom: 20px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= Yii::app()->createUrl('mobil/index') ?>">Mobil</a>
                    <a class="nav-item nav-link" href="<?= Yii::app()->createUrl('brand/index') ?>">Merk</a>
                    <a class="nav-item nav-link" href="<?= Yii::app()->createUrl('brandtype/index') ?>">Tipe</a>
                </div>
            </div>
        </nav>
        <?php echo $content; ?>
    </div>
    
    <?php $getCs->registerScriptFile($baseUrl.'/js/jquery-3.3.1.js'); ?>
    <?php $getCs->registerScriptFile($baseUrl.'/js/jquery.dataTables.min.js'); ?>
    <?php $getCs->registerScriptFile($baseUrl.'/js/dataTables.bootstrap4.min.js'); ?>
    <?php $getCs->registerScriptFile($baseUrl.'/js/bootstrap.min.js'); ?>
</body>
</html>