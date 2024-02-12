<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

<h1><?php echo UserModule::t("Restore"); ?></h1>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<ol class="breadcrumb">
    <?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
	<?php endif?>
  </ol>
			</section>
<section class="content">	
<?php echo CHtml::beginForm(); ?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Payment</h3>
		  <div class="box-title pull-right" id="due"> </div>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="form-group">
		<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
		<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
	</div>
	
	 </div>
    <div class="box-footer">  
		<?php echo CHtml::submitButton(UserModule::t("Restore"),array('class'=>'btn btn-primary')); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div>
  
 </div>
<?php endif; ?>