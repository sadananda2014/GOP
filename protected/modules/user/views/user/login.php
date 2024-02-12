<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<?php echo UserModule::t("Login"); ?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>


	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>


<?php endif; ?>

<?php //echo UserModule::t("Please fill out the following form with your login credentials:"); ?>

 <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
				<?php echo CHtml::beginForm(); ?>
                <div class="body bg-gray">
					
					
						<?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?>
						<?php echo CHtml::errorSummary($model); ?>
	
					<div class="form-group">
							<?php //echo CHtml::activeLabelEx($model,'username'); ?>
							<?php echo CHtml::activeTextField($model,'username',array('class'=>'form-control')) ?>
					</div>		
					<div class="form-group">		
							<?php //echo CHtml::activeLabelEx($model,'password'); ?>
							<?php echo CHtml::activePasswordField($model,'password',array('class'=>'form-control')) ?>
					</div>
					<div class="form-group">
							<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
							<?php echo CHtml::activeLabelEx($model,'rememberMe',array('class'=>'')); ?>
					</div>
				</div>
				<div class="footer">  
		
						<?php echo CHtml::submitButton(UserModule::t("Login"),array('class'=>'btn bg-olive btn-block')); ?>
						<p> <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
				</div>
	
<?php echo CHtml::endForm(); ?>
</div>

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>