<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);
?>

<h2><?php echo UserModule::t("Change password"); ?></h2>
<?php echo $this->renderPartial('menu'); ?>

<ol class="breadcrumb">
    <?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
	<?php endif?>
  </ol>
			</section>
<section class="content">	
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Change Password</h3>
		  <div class="box-title pull-right" id="due"> </div>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	
	 </div>
    <div class="box-footer">  
	<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn btn-primary')); ?>
	</div>
</div>
  
 </div>
<?php $this->endWidget(); ?>