<script>
$(document).ready(function(){
      $("#Registration_enquiry_id").select2();
});
</script>
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
  'id'=>'registration-form',
  'enableAjaxValidation'=>false,
  'enableClientValidation'=>true,
  'htmlOptions'=>array(
    'enctype' => 'multipart/form-data',
)
)); ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>

  
  <div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header">
    <h3 class="box-title">PERSONAL INFORMATION</h3>
      </div><!-- /.box-header -->
  <div class="box-body">
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'enquiry_id'); ?></label>
    <?php if($model->isNewRecord) { ?>
    <?php $Criteria = new CDbCriteria();
              $Criteria->condition = "enquiry_id not in(select enquiry_id from registration) order By enquiry_id DESC";
        echo $form->dropDownList($model,'enquiry_id',CHtml::listData(Enquiry::model()->findAll($Criteria), 'enquiry_id', 'enquiryInfo'),array('empty'=>'Select Enquiry','class'=>'form-control')); }
      
      else
      {   
        $Criteria = new CDbCriteria();
                $Criteria->condition = "enquiry_id=".$model->enquiry_id."";
         echo $form->dropDownList($model,'enquiry_id',CHtml::listData(Enquiry::model()->findAll($Criteria), 'enquiry_id', 'trainee_name'),array('class'=>'form-control','readonly'=>true));
        //echo $form->textField($model,'enquiry_id',array('class'=>'form-control','readonly'=>true,'value'=>Enquiry::model()->findByPk((int)$model->enquiry_id)->trainee_name,));
      }      
      ?>
    
    <?php echo $form->error($model,'enquiry_id'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'name'); ?></label>
    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'name'); ?>
  </div>
  
    <!-- <div class="form-group">
    <label><?php// echo $form->labelEx($model,'middle_name'); ?></label>
    <?php //echo $form->textField($model,'middle_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php //echo $form->error($model,'middle_name'); ?>
   </div> -->

   <div class="form-group">
    <label><?php echo $form->labelEx($model,'last_name'); ?></label>
    <?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'last_name'); ?>
   </div>
   
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'dob'); ?></label>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'dob',
                'name'=>'dob',
                'value'=>date('Y-m-D'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                  'dateFormat' => 'yy-mm-dd',
                  'showButtonPanel'=>true,
                  'maxDate'=>"+0D",
          'changeMonth'=>true,
                  'changeYear'=>true,
          'yearRange'=>'1995:2030',
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
          'onchange'=>'Get_age(this.value)',
                  //'readonly'=>true,
                ),
              ));  ?>
    <?php echo $form->error($model,'dob'); ?>
  </div>
  
      <label><?php echo $form->labelEx($model,'gender'); ?></label>
  <div class="radio">
    <?php $gender_types = array('male' => 'MALE', 'female' => 'FEMALE');
        $options = array('uncheckValue' => null,'class'=>'form-control');
        echo CHtml::activeRadioButtonList($model, 'gender', $gender_types, $options); ?>
    <?php echo $form->error($model,'gender'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'age'); ?></label>
    <?php echo $form->textField($model,'age',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'age'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'class'); ?></label>
    <?php echo $form->textField($model,'class',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'class'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'weight'); ?></label>
    <?php echo $form->textField($model,'weight',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'weight'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'height'); ?></label>
    <?php echo $form->textField($model,'height',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'height'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'blood_group'); ?></label>
    <?php echo $form->textField($model,'blood_group',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'blood_group'); ?>
  </div>

  <div class="form-group" style="display:none;">
    <label><?php echo $form->labelEx($model,'uniform_size'); ?></label>
    <?php echo $form->textField($model,'uniform_size',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'uniform_size'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'past_training_experience'); ?></label>
    <?php echo $form->textArea($model,'past_training_experience',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'past_training_experience'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'represented_team'); ?></label>
    <?php echo $form->textField($model,'represented_team',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'represented_team'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'school'); ?></label>
    <?php //echo $form->textField($model,'school',array('size'=>60,'maxlength'=>240,'class'=>'form-control')); ?>
    <?php  echo $form->dropDownList($model,'school',CHtml::listData(Schools::model()->findAll(), 'school_name', 'school_name'),array('empty'=>'Select School','class'=>'form-control')); ?>
    <?php echo $form->error($model,'school'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'medical_conditions'); ?>(Astama,Head injury,etc)</label>
    <?php echo $form->textField($model,'medical_conditions',array('size'=>60,'maxlength'=>240,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'medical_conditions'); ?>
  </div>
  
  <div class="form-group">
  
  <label><?php echo $form->labelEx($model,'joined_date'); ?></label>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'joined_date',
                'name'=>'joined_date',
                'value'=>date('Y-m-d'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                  'dateFormat' => 'yy-mm-dd',
                  'showButtonPanel'=>true,
            'changeMonth'=>true,
          'changeYear'=>true,
                  'maxDate'=>"+0D",
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
                  'readonly'=>true,
                  //'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              )); ?>
    <?php echo $form->error($model,'joined_date'); ?>
  
  </div>
  
  
<label><?php echo $form->labelEx($model,'image'); ?></label>
 <div class="fileinput fileinput-new" data-provides="fileinput">  
   <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 225px;"><img id="blah"  width="200" height="200" src="<?php  if($model->isNewRecord) { echo Yii::app()->baseUrl."/img/no-photo-icon.png"; } else { if($model->image!=null) { echo Yii::app()->baseUrl."/img/profile/".$model->image; } else {echo Yii::app()->baseUrl."/img/no-photo-icon.png";}} ?>" style="margin-bottom:5px;;"/><?php echo $form->fileField($model,'image',array('class'=>'form-control','onchange'=>'readURL(this)')); ?></div>
    <div> 
  <div class="form-group">
    
    
    <?php echo $form->error($model,'image'); ?>
  </div>
  </div>
 </div>  
   </div>
  </div>
 </div>
 
 <div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header">
  <h3 class="box-title">CONTACT INFORMATION</h3>
    </div><!-- /.box-header -->
  <div class="box-body">
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'full_address'); ?></label>
    <?php echo $form->textArea($model,'full_address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'full_address'); ?>
  </div>
   
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'pincode'); ?></label>
    <?php echo $form->textField($model,'pincode',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'pincode'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'trainee_phone'); ?></label>
    <?php echo $form->textField($model,'trainee_phone',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'trainee_phone'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'trainee_email'); ?></label>
    <?php echo $form->textField($model,'trainee_email',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'trainee_email'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'residence_phone'); ?></label>
    <?php echo $form->textField($model,'residence_phone',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'residence_phone'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'primary_contact_person'); ?></label>
    <?php $relation_types = array('father' => 'Father', 'mother' => 'Mother','self' => 'Self', 'guardian' => 'Guardian ');
        $options = array('empty'=>'Select Primary Contact Person','class'=>'form-control');
        echo $form->dropDownList($model,'primary_contact_person',$relation_types,$options); ?>
    <?php echo $form->error($model,'primary_contact_person'); ?>
    (Please fill the information of selected primary contact person.)
  </div>

  
  </div>
 </div>
</div>  
<div class="col-md-6">
 <div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">PARENTS INFORMATION</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'fathers_name'); ?></label>
    <?php echo $form->textField($model,'fathers_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'fathers_name'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'fathers_phone'); ?></label>
    <?php echo $form->textField($model,'fathers_phone',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'fathers_phone'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'fathers_email'); ?></label>
    <?php echo $form->textField($model,'fathers_email',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'fathers_email'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'mothers_name'); ?></label>
    <?php echo $form->textField($model,'mothers_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'mothers_name'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'mothers_phone'); ?></label>
    <?php echo $form->textField($model,'mothers_phone',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'mothers_phone'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'mothers_email'); ?></label>
    <?php echo $form->textField($model,'mothers_email',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'mothers_email'); ?>
  </div>
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'guardian_name'); ?></label>
    <?php echo $form->textField($model,'guardian_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'guardian_name'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'guardian_phone'); ?></label>
    <?php echo $form->textField($model,'guardian_phone',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'guardian_phone'); ?>
  </div>

  <div class="form-group">
    <label><?php echo $form->labelEx($model,'guardian_email'); ?></label>
    <?php echo $form->textField($model,'guardian_email',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'guardian_email'); ?>    
  </div>
  
  <div class="form-group">
    <label><?php echo $form->labelEx($model,'emergency_contact'); ?></label>
    <?php echo $form->textArea($model,'emergency_contact',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'emergency_contact'); ?>
  </div>
  
  </div>
 </div>
</div>
  <div class="col-md-12">
   <div class="box box-primary">
          <div class="box-header">
        <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
     <div class="box-body">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
  </div>
   </div>
  </div>
 

<?php $this->endWidget(); ?>
<script language="javascript">
function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
    
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(180);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  
  function Get_age(date)
  {
    var dt = new Date();
    var df = new Date(date);    
    var allMonths= dt.getMonth() - df.getMonth() + (12 * (dt.getFullYear() - df.getFullYear()));
    
    var allYears= dt.getFullYear() - df.getFullYear();
    var partialMonths = dt.getMonth() - df.getMonth();
    if (partialMonths < 0) 
      {
        allYears--;
        partialMonths = partialMonths + 12;
      }
    var total = allYears + " years and " + partialMonths + " months.";
    console.log(total);
    $('#Registration_age').val(total);
  }
</script>  

  