<?php
/* @var $this StudentJersyController */
/* @var $model StudentJersy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-jersy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->textField($model,'brand_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color_id'); ?>
		<?php echo $form->textField($model,'color_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'color_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size_id'); ?>
		<?php echo $form->textField($model,'size_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'size_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jersy_id'); ?>
		<?php echo $form->textField($model,'jersy_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'jersy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_assigned'); ?>
		<?php echo $form->textField($model,'date_assigned',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'date_assigned'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_delivery'); ?>
		<?php echo $form->textField($model,'date_delivery',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'date_delivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->