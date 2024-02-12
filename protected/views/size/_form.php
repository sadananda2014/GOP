<?php
/* @var $this SizeController */
/* @var $model Size */
/* @var $form CActiveForm */
?>

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
	'id'=>'size-form',
	'enableClientValidation'=>true,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
 <div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Size <small> Fields with <span class="required">*</span> are required.</small></h3>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<div class="form-group">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>
 </div>
	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div> 
</div><!-- form -->