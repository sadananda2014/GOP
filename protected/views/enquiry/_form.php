  <ol class="breadcrumb">
    <?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
	<?php endif?>
  </ol>
			</section>
<section class="content">			
        <!-- Main content --> 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'enquiry-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>
		
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
  <div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Enquiry</h3>
      	</div><!-- /.box-header -->
	     <div class="box-body">
	      <div class="form-group">
			<label><?php echo $form->labelEx($model,'enquiry_name'); ?></label>
			<?php echo $form->textField($model,'enquiry_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'enquiry_name'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'enquiry_location'); ?></label>
			<?php echo $form->textField($model,'enquiry_location',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'enquiry_location'); ?>
         </div>		

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'enquiry_date'); ?></label>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$model,
								'attribute'=>'enquiry_date',
								'name'=>'enquiry_date',
								'value'=>date('Y-m-D'),
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
								),
							)); ?>
			<?php echo $form->error($model,'enquiry_date'); ?>
		 </div>
			
			<label><?php echo $form->labelEx($model,'enquiry_type'); ?></label>
		 <div class="radio">
			
			<?php $enquiry_types = array('walk_in_ground' => 'Walk In-ground', 'office_phone' => 'Office Phone', 'personal_phone' => 'Personal Phone', 'website' => 'Website','online_ads' => 'Online Ads', 'other' => 'Other');
				  $options = array('uncheckValue' => null,'class'=>'form-control');
				  echo CHtml::activeRadioButtonList($model, 'enquiry_type', $enquiry_types, $options); 
				  //echo " :".CHtml::activetextField($model,'enquiry_type',array('disabled'=>'true'));        ?>
			<?php echo $form->error($model,'enquiry_type'); ?>
		 </div>

		   <label><?php echo $form->labelEx($model,'how_did_they_know_about_us'); ?></label>
		 <div class="radio">
			<?php $about_us_types = array('referral' => 'Referral', 'online_search' => 'Online Search', 'advertisement' => 'Advertisement', 'walk_in' => 'Walk-In','google_ads' => 'Google Ads','instagram_ads' => 'Instagram Ads', 'other ' => 'Other ');
				  $options = array('uncheckValue' => null,'class'=>'form-control');
				  echo CHtml::activeRadioButtonList($model, 'how_did_they_know_about_us', $about_us_types, $options);
				   //echo " :".CHtml::activetextField($model,'how_did_they_know_about_us',array('disabled'=>'true'));	?>
			<?php echo $form->error($model,'how_did_they_know_about_us'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'trainee_name'); ?></label>
			<?php echo $form->textField($model,'trainee_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'trainee_name'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'trainee_age'); ?></label>
			<?php echo $form->textField($model,'trainee_age',array('size'=>40,'maxlength'=>40,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'trainee_age'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'trainee_school'); ?></label>
			<?php echo $form->textField($model,'trainee_school',array('size'=>60,'maxlength'=>240,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'trainee_school'); ?>
		 </div>
     </div>
	</div>	
	
	 <div class="box box-primary">
     		<div class="box-header">
				<h3 class="box-title">Status</h3>
            </div><!-- /.box-header -->
		<div class="box-body">	
		<label><?php echo $form->labelEx($model,'status'); ?></label>
		 <div class="radio">
			
			<?php  $status_types = array('call_back' => 'No Response/ Call back','trial_scheduled' => 'Trial Scheduled','trial_completed' => 'Trial Completed','future' => 'Future Lead','junk' => 'Junk Lead','not_joining' => 'Not Joining','dnd' => 'Do Not Disturb');
   				   $options = array('uncheckValue' => null,'class'=>'form-control');
				   echo CHtml::activeRadioButtonList($model, 'status', $status_types, $options); ?>
			<?php echo $form->error($model,'status'); ?>
		 </div>
		</div>
	 </div>
	</div> 
 <div class="col-md-6">
	<div class="box box-primary">
	  <div class="box-header">
		<h3 class="box-title">Relation of Enquirer with Potential joinee</h3>
      </div><!-- /.box-header -->
	<div class="box-body">	
					<label><?php echo $form->labelEx($model,'relation_between_enquirer_joinee'); ?></label>
		 <div class="radio">
			<?php  $relation_types = array('father' => 'father', 'mother' => 'mother', 'sibling' => 'sibling', 'self' => 'self', 'guardian ' => 'Guardian ');
				   $options = array('uncheckValue' => null,'class'=>'form-control');
				  // echo CHtml::activeRadioButtonList($model, 'relation_between_enquirer_joinee', $relation_types, $options);	
					echo $form->dropDownList($model,'relation_between_enquirer_joinee',$relation_types,array('empty'=>'Select Relation','class'=>'form-control')); ?>
			<?php echo $form->error($model,'relation_between_enquirer_joinee'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'phone'); ?></label>
			<?php echo $form->textField($model,'phone',array('size'=>12,'maxlength'=>12,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'phone'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'email'); ?></label>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		 </div>
	  </div>
    </div>
 
 
 <div class="box box-primary">
	<div class="box-header">
							<h3 class="box-title">Preferred Center</h3>
                                		</div><!-- /.box-header -->
						<div class="box-body"> 
		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'preferred_center'); ?></label>
			<?php echo $form->dropDownList($model,'preferred_center',CHtml::listData(Center::model()->findAll(), 'id', 'center_name'),array('empty'=>'Select Center','class'=>'form-control')); ?>
			<?php echo $form->error($model,'preferred_center'); ?>
		 </div>

		 <label><?php echo $form->labelEx($model,'preferred_batch'); ?></label>
		 <div class="radio">
			 <?php   $batch_types = array('Weekday' => 'Weekday', 'Weekend' => 'Weekend', 'Summer Camp' => 'Summer Camp','other ' => 'Other ');
				    $options = array('uncheckValue' => null,'class'=>'form-control');
					echo CHtml::activeRadioButtonList($model, 'preferred_batch', $batch_types, $options);
					//echo $form->textField($model,'preferred_batch',array('size'=>40,'maxlength'=>40,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'preferred_batch'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'additional_comments'); ?></label>
			<?php echo $form->textArea($model,'additional_comments',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'additional_comments'); ?>
		 </div>
	</div>
  </div>
   
 
 <div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Follow Up</h3>
    </div><!-- /.box-header -->
  <div class="box-body">
		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'follow_up'); ?></label>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$model,
								'attribute'=>'follow_up',
								'name'=>'follow_up',
								// additional javascript options for the date picker plugin
								'options'=>array(
								   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'dateFormat' => 'yy-mm-dd',
									'showButtonPanel'=>true,
									'minDate'=>"-3D",
								),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'readonly'=>true,
								),
							)); ?>
			<?php echo $form->error($model,'follow_up'); ?>
		 </div>

		 <div class="form-group">
			<label><?php echo $form->labelEx($model,'follow_up_comment'); ?></label>
			<?php echo $form->textField($model,'follow_up_comment',array('size'=>60,'maxlength'=>240,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'follow_up_comment'); ?>
		 </div>

   </div>
  </div> 
  </div>	

  <div class="col-md-12">
      <div class="box">
		<div class="box-footer">  
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	    </div>
	  </div>
  </div>
<?php $this->endWidget(); ?>

   