<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'payment_id'); ?>
		<?php echo $form->textField($model,'payment_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_date'); ?>
		<?php echo $form->textField($model,'payment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'joined_date'); ?>
		<?php echo $form->textField($model,'joined_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_id'); ?>
		<?php echo $form->textField($model,'course_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_fee'); ?>
		<?php echo $form->textField($model,'total_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_now'); ?>
		<?php echo $form->textField($model,'pay_now'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balnce'); ?>
		<?php echo $form->textField($model,'balnce'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reciept_no'); ?>
		<?php echo $form->textField($model,'reciept_no',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mode_of_payment'); ?>
		<?php echo $form->textField($model,'mode_of_payment',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->