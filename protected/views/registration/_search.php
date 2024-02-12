<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'register_id'); ?>
		<?php echo $form->textField($model,'register_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enquiry_id'); ?>
		<?php echo $form->textField($model,'enquiry_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php echo $form->textField($model,'dob',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class'); ?>
		<?php echo $form->textField($model,'class',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'blood_group'); ?>
		<?php echo $form->textField($model,'blood_group',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uniform_size'); ?>
		<?php echo $form->textField($model,'uniform_size',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'past_training_experience'); ?>
		<?php echo $form->textArea($model,'past_training_experience',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'represented_team'); ?>
		<?php echo $form->textField($model,'represented_team',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'school'); ?>
		<?php echo $form->textField($model,'school',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medical_conditions'); ?>
		<?php echo $form->textField($model,'medical_conditions',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_address'); ?>
		<?php echo $form->textArea($model,'full_address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pincode'); ?>
		<?php echo $form->textField($model,'pincode',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trainee_phone'); ?>
		<?php echo $form->textField($model,'trainee_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trainee_email'); ?>
		<?php echo $form->textField($model,'trainee_email',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'residence_phone'); ?>
		<?php echo $form->textField($model,'residence_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primary_contact_person'); ?>
		<?php echo $form->textField($model,'primary_contact_person',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emergency_contact'); ?>
		<?php echo $form->textArea($model,'emergency_contact',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathers_name'); ?>
		<?php echo $form->textField($model,'fathers_name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathers_phone'); ?>
		<?php echo $form->textField($model,'fathers_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathers_email'); ?>
		<?php echo $form->textField($model,'fathers_email',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mothers_name'); ?>
		<?php echo $form->textField($model,'mothers_name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mothers_phone'); ?>
		<?php echo $form->textField($model,'mothers_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mothers_email'); ?>
		<?php echo $form->textField($model,'mothers_email',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->