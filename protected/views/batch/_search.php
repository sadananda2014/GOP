<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'batch_id'); ?>
		<?php echo $form->textField($model,'batch_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batch_name'); ?>
		<?php echo $form->textField($model,'batch_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batch_location'); ?>
		<?php echo $form->textField($model,'batch_location',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batch_timing'); ?>
		<?php echo $form->textField($model,'batch_timing',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coach_id'); ?>
		<?php echo $form->textField($model,'coach_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->