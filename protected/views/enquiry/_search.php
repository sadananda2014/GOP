<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'enquiry_id'); ?>
		<?php echo $form->textField($model,'enquiry_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enquiry_name'); ?>
		<?php echo $form->textField($model,'enquiry_name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enquiry_location'); ?>
		<?php echo $form->textField($model,'enquiry_location',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enquiry_date'); ?>
		<?php echo $form->textField($model,'enquiry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enquiry_type'); ?>
		<?php echo $form->textField($model,'enquiry_type',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'how_did_they_know_about_us'); ?>
		<?php echo $form->textField($model,'how_did_they_know_about_us',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trainee_name'); ?>
		<?php echo $form->textField($model,'trainee_name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trainee_age'); ?>
		<?php echo $form->textField($model,'trainee_age',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trainee_school'); ?>
		<?php echo $form->textField($model,'trainee_school',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relation_between_enquirer_joinee'); ?>
		<?php echo $form->textField($model,'relation_between_enquirer_joinee',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferred_center'); ?>
		<?php echo $form->textField($model,'preferred_center',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferred_batch'); ?>
		<?php echo $form->textField($model,'preferred_batch',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_comments'); ?>
		<?php echo $form->textArea($model,'additional_comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'follow_up'); ?>
		<?php echo $form->textField($model,'follow_up'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'follow_up_comment'); ?>
		<?php echo $form->textField($model,'follow_up_comment',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->