<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kit-items-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'item_name'); ?>
		<?php echo $form->textField($model,'item_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'item_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qauntity'); ?>
		<?php echo $form->textField($model,'qauntity'); ?>
		<?php echo $form->error($model,'qauntity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->