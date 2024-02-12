<?php
/* @var $this InventoryController */
/* @var $model Inventory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventory-form',
	'enableClientValidation'=>true,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php echo $form->dropDownList($model,'item_id',$model->getItemId(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',$model->getBrandId(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color_id'); ?>
		<?php echo $form->dropDownList($model,'color_id',$model->getColorId(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'color_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size_id'); ?>
		<?php echo $form->dropDownList($model,'size_id',$model->getSizeId(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'size_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
