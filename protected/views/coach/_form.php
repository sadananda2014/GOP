<ol class="breadcrumb">
    <?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
	<?php endif?>
  </ol>
			</section>
<section class="content">	

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coach-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
 <div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Coach<small>Fields with <span class="required">*</span> are required.</small></h3>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<div class="form-group">
		<?php echo $form->labelEx($model,'coach_name'); ?>
		<?php echo $form->textField($model,'coach_name',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'coach_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	</div>
	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->