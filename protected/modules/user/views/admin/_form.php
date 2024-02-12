
<ol class="breadcrumb">
    <?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
	<?php endif?>
  </ol>
			</section>
<section class="content">	
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">User</h3>
		  <div class="box-title pull-right" id="due"> </div>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	<?php echo CHtml::errorSummary(array($model,$profile)); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'email'); ?>
		<?php echo CHtml::activeTextField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'email'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'superuser'); ?>
		<?php echo CHtml::activeDropDownList($model,'superuser',User::itemAlias('AdminStatus'),array('class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'superuser'); ?>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'center'); ?>
		<?php echo CHtml::activeDropDownList($model,'center',CHtml::listData(Center::model()->findAll(), 'id', 'center_name'),array('empty'=>'Select Center','class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'center'); ?>
	</div>
</div>
  
 </div>	
	</div>
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header">
	<h3 class="box-title"> User </h3>
    </div><!-- /.box-header -->
	<div class="box-body">
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'status'); ?>
		<?php echo CHtml::activeDropDownList($model,'status',User::itemAlias('UserStatus'),array('class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'status'); ?>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($profile,$field->varname); ?>
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile,array('class'=>'form-control'));
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>'form-control'));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control'));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
		}
		 ?>
		<?php echo CHtml::error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	 </div>
	</div> 
	</div> 
  <div class="col-md-12">	 
    <div class="box-footer">  
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>
	<?php echo CHtml::endForm(); ?>
 </div>
  
 

