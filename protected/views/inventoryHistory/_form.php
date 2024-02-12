<?php
/* @var $this InventoryHistoryController */
/* @var $model InventoryHistory */
/* @var $form CActiveForm */
$this->setPageTitle('Add Inventory');
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
 <div class="row">
    <div class="col-md-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventory-history-form',
	//'h1'=>'CActiveForm',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<small>Fields with <span class="required">*</span> are required.</small>

	<?php echo $form->errorSummary($model); ?>
<div class="box-body">
   <div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'item_id'); ?>
		<?php echo $form->dropDownList($model,'item_id',Inventory::model()->getItemId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'item_id'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',Inventory::model()->getBrandId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'color_id'); ?>
		<?php echo $form->dropDownList($model,'color_id',Inventory::model()->getColorId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'color_id'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'size_id'); ?>
		<?php echo $form->dropDownList($model,'size_id',Inventory::model()->getSizeId(),array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'size_id'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('empty'=>'select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$model,
								'attribute'=>'date',
								'name'=>'date',
								'value'=>date('Y-m-d'),
								// additional javascript options for the date picker plugin
								'options'=>array(
								   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'dateFormat' => 'yy-mm-dd',
									'showButtonPanel'=>true,
									'maxDate'=>"+0D",
								),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'readonly'=>true,
									'value'=>CTimestamp::formatDate('Y-m-d'),
								),
							)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary pull-right')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>
<!-- form -->