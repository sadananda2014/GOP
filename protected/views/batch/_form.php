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
	'id'=>'batch-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
 <div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Batch<small>Fields with <span class="required">*</span> are required.</small></h3>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<div class="form-group">
		<?php echo $form->labelEx($model,'batch_name'); ?>
		<?php echo $form->textField($model,'batch_name',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'batch_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'batch_location'); ?>
		<?php echo $form->dropDownList($model,'batch_location',CHtml::listData(Center::model()->findAll(), 'id', 'center_name'),array('empty'=>'Select Center','class'=>'form-control')); ?>
		<?php echo $form->error($model,'batch_location'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'batch_timing'); ?>
		<?php echo $form->textField($model,'batch_timing',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'batch_timing'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'coach_id'); ?>
		<?php echo $form->dropDownList($model,'coach_id',CHtml::listData(Coach::model()->findAll(), 'coach_id', 'coach_name'),array('empty'=>'Select Coach','class'=>'form-control')); ?>
		<?php echo $form->error($model,'coach_id'); ?>
	</div>

	</div>
	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->