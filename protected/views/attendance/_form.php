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
	'id'=>'attendance-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>
<div class="col-md-12">
  <div class="box box-primary">
	<div class="box-header">
     <h3 class="box-title">Enquiry   <small>Fields with <span class="required">*</span> are required.</small></h3>
    </div><!-- /.box-header -->
     <div class="box-body">
   <div class="row">	
	

	<?php //echo $form->errorSummary($model); ?>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'student_batch_id',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'student_batch_id',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'student_batch_id'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'date',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'date',array('readonly'=>true,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?><br/>
		<?php  echo $form->checkBox($model,"status",array('value'=>'Present' ,'uncheckValue' =>'Absent','class'=>'form-control pull-right'));  ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
    </div>
 </div>
		<div class="box-footer">  
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>	
 </div>
</div> 
<?php $this->endWidget(); ?>
