<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change Password"),
);
?>

<h1><?php echo UserModule::t("Change Password"); ?></h1>


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

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Change Password</h3>
		  <div class="box-title pull-right" id="due"> </div>
      	</div><!-- /.box-header -->
	     <div class="box-body">	
	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="form-group">
	<?php echo CHtml::activeLabelEx($form,'password'); ?>
	<?php echo CHtml::activePasswordField($form,'password',array('class'=>'form-control')); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="form-group">
	<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
	<?php echo CHtml::activePasswordField($form,'verifyPassword',array('class'=>'form-control')); ?>
	</div>
	
	
	 </div>
    <div class="box-footer">  
	<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn btn-primary')); ?>
	</div>
</div>
  
 </div>
<?php echo CHtml::endForm(); ?>