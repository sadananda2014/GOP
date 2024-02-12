<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assign-kit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'batch_students_id'); ?>
		<?php echo $form->textField($model,'batch_students_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'batch_students_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kit_item_id'); ?>
		<?php echo $form->textField($model,'kit_item_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'kit_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand'); ?>
		<?php echo $form->textField($model,'brand',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'brand'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->