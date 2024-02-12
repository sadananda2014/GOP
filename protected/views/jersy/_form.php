<?php
/* @var $this JersyController */
/* @var $model Jersy */
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
	'id'=>'jersy-form',
	'enableClientValidation'=>true,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
 <div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Jersy</h3>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	      
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',Inventory::model()->getBrandId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'color_id'); ?>
		<?php echo $form->dropDownList($model,'color_id',Inventory::model()->getColorId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'color_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'size_id'); ?>
		<?php echo $form->dropDownList($model,'size_id',Inventory::model()->getSizeId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'size_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>
</div>
</div>
</div>
		 
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary pull-right')); ?>
	   
	

<?php $this->endWidget(); ?>
