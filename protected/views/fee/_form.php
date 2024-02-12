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
	'id'=>'fee-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
 <div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Fee<small>Fields with <span class="required">*</span> are required.</small></h3>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<div class="form-group">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'total_fee'); ?>
		<?php echo $form->textField($model,'total_fee',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'total_fee'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	</div>
	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->