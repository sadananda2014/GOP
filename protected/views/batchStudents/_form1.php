<script >  
  $(document).ready(function() {
       $('.cycle').on('change', function(e) {
	   
	   e.preventDefault();
          var id = $(this).attr('id').match(/\d+/)[0];
		  //alert(id);
		  var cycle_of_fee=$("#BatchStudents_"+id+"_cycle_of_fee").val();
		  var monthly_fee=$("#BatchStudents_"+id+"_monthly_fee").val();
		  if(cycle_of_fee!="")
		  {
		     $.ajax({
                       url: "index.php?r=BatchStudents/Feedetails",
                       type: 'POST',
                       data: {cycle_of_fee: cycle_of_fee},
                       cache: false,
                       success: function(data) {
                              
						data1=JSON.parse(data);	
					
					 //alert(data1[0].monthly_fee);
				
					 if(data1[0].monthly_fee!=""){
					$("#BatchStudents_"+id+"_monthly_fee").val(data1[0].monthly_fee)
					} else { $("#BatchStudents_"+id+"_monthly_fee").val("") }
					/*if(data1[0].total_fee!=""){
					$("#BatchStudents_"+id+"_total_fee").val(data1[0].total_fee) }
					else {$("#BatchStudents_"+id+"_total_fee").val("") }*/ 
				
                
					                                       
                      },
                       error: function(){
                         alert("Something went wrong try again")
                       }
                 });
            
            }
          else
           {
		     alert("please select Cycle of fee correct values");
		  }
  });
  })
</script>
<?php
/* @var $this BatchStudentsController */
/* @var $model BatchStudents */
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
	'id'=>'batch-students-form',
	'enableClientValidation'=>true,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

 <div class="box-body">
   <div class="row">
     
  <?php foreach($models as $i=>$model1): ?>
   <!-- <div class="form-group col-md-4">  
		<label class="control-label" for="">Student Id</label>
		<input type="text" class="form-control" value="<?php //echo $model1->register_id; ?>" disabled />
	</div>-->
    <div class="form-group col-md-3">
        <label class="control-label" for="">Student Name</label>
        <input type="text" class="form-control" value="<?php echo $model1->name; echo $model1->last_name; ?>" disabled />
    </div>
	<div class="form-group col-md-2"> 
      <label class="control-label" for="">Select Batch</label><br />
       <?php echo $form->dropDownList($model,"[$i]batch_id",$model->getBatchId(),array('empty'=>'Select','class'=>'form-control')); ?></td>
   </div>
   <div class="form-group col-md-2"> 
      <?php echo $form->labelEx($model,'cycle_of_fee',array('class'=>'control-label')); ?>
       <?php echo $form->dropDownList($model,"[$i]cycle_of_fee",CHtml::listData(Fee::model()->findAll(), 'id', 'description'),array('empty'=>'Select','class'=>'cycle form-control')); ?></td>
		<?php echo $form->error($model,'cycle_of_fee'); ?>
  </div>
  
    <div class="form-group col-md-2" style="display:none;"> 
      <?php echo $form->labelEx($model,'total_fee',array('class'=>'control-label')); ?>
       <?php echo $form->hiddenField($model,"[$i]total_fee",array('class'=>'form-control')); ?>
	   <?php echo $form->error($model,'total_fee'); ?>
   </div>
   
   <div class="form-group col-md-2"> 
      <?php echo $form->labelEx($model,'monthly_fee',array('class'=>'control-label')); ?>
       <?php echo $form->textField($model,"[$i]monthly_fee",array('class'=>'cycle1 form-control','autocomplete'=>'off')); ?>
	   <?php echo $form->error($model,'monthly_fee'); ?>
   </div>
   <div class="form-group col-md-2"> 
      <?php echo $form->labelEx($model,'registration_fees',array('class'=>'control-label')); ?>
       <?php echo $form->textField($model,"[$i]registration_fees",array('class'=>'form-control')); ?>
	   <?php echo $form->error($model,'registration_fees'); ?>
   </div>
 <?php endforeach; ?>
   </div>   
 </div>
 <?php if((bool)$models)
 { ?>
   <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>
<?php } else { ?>

<div class="alert alert-danger alert-dismissable">
     <i class="fa fa-ban"></i>
   <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <b>No New Students!!!!!</b> 
 </div>

<?php } $this->endWidget(); ?>
