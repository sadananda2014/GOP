<script >  
  $(document).ready(function() {
       $('.cycle').on('change', function(e) {
	   
	   e.preventDefault();
          //var id = $(this).attr('id').match(/\d+/)[0];
		  //alert(id);
		  var cycle_of_fee=$("#BatchStudents_cycle_of_fee").val();
		  var monthly_fee=$("#BatchStudents_monthly_fee").val();
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
					$("#BatchStudents_monthly_fee").val(data1[0].monthly_fee)
					} else { $("#BatchStudents_monthly_fee").val("") }
					/*if(data1[0].total_fee!=""){
					$("#BatchStudents_total_fee").val(data1[0].total_fee) }
					else {$("#BatchStudents_total_fee").val("") }*/ 
				
                

 
                 
					 //alert(data1[0].total_fee);
					//alert("Success")                                          
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


      /* $('.cycle1').on('change', function(e) {
    	   
    	   e.preventDefault();
              //var id = $(this).attr('id').match(/\d+/)[0];
    		  //alert(id);
    		  var cycle_of_fee=$("#BatchStudents_cycle_of_fee").val();
    		  var monthly_fee=$("#BatchStudents_monthly_fee").val();
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
    				if(monthly_fee=="")	 
    				{
    					 if(data1[0].monthly_fee!=""){
    					$("#BatchStudents_monthly_fee").val(data1[0].monthly_fee)
    					} else { $("#BatchStudents_monthly_fee").val("") }
    					if(data1[0].total_fee!=""){
    					$("#BatchStudents_total_fee").val(data1[0].total_fee) }
    					else {$("#BatchStudents_total_fee").val("") } 
    				}
                    else
    				{
                      total_fee=monthly_fee*data1[0].duration;
                      $("#BatchStudents_total_fee").val(total_fee)
                     //alert(total_fee);
    				}

     
                     
    					 //alert(data1[0].total_fee);
    					//alert("Success")                                          
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
      });*/
  })
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
	'id'=>'batch-students-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

<div class="box-body">
   <div class="row">	
     
	 <p>Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<!--<div class="form-group col-md-3">
		<?php //echo $form->labelEx($model,'student_id',array('class'=>'control-label')); ?>
		<?php echo $form->hiddenField($model,'student_id',array('size'=>10,'maxlength'=>10,'class'=>'form-control','readonly'=>true)); ?>
		<?php //echo $form->error($model,'student_id'); ?>
	</div>-->

	<div class="form-group col-md-2">
		<?php echo $form->labelEx($model,'student_name',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'student_name',array('size'=>60,'maxlength'=>120,'class'=>'form-control','readonly'=>true)); ?>
		<?php echo $form->error($model,'student_name'); ?>
	</div>

	<div class="form-group col-md-2">
		<?php echo $form->labelEx($model,'batch_id',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'batch_id',$model->getBatchId(),array('empty'=>'Select','class'=>'form-control')); ?>
		<?php echo $form->error($model,'batch_id'); ?>
	</div>
	
   <div class="form-group col-md-2" > 
      <?php echo $form->labelEx($model,'cycle_of_fee',array('class'=>'control-label')); ?>
       <?php echo $form->dropDownList($model,"cycle_of_fee",CHtml::listData(Fee::model()->findAll(), 'id', 'description'),array('empty'=>'Select','class'=>'cycle form-control')); ?>
	   <?php echo $form->error($model,'cycle_of_fee'); ?>	
  </div>
   
    <div class="form-group col-md-2"> 
      <?php echo $form->labelEx($model,'monthly_fee',array('class'=>'control-label')); ?>
       <?php echo $form->textField($model,"monthly_fee",array('class'=>'cycle1 form-control','autocomplete'=>'off')); ?>
	   <?php echo $form->error($model,'monthly_fee'); ?>
   </div>
   
    <div class="form-group col-md-2" style="display:none" > 
      <?php echo $form->labelEx($model,'total_fee',array('class'=>'control-label')); ?>
       <?php echo $form->textField($model,"total_fee",array('class'=>'form-control')); ?>
	   <?php echo $form->error($model,'total_fee'); ?>
   </div>
   
   <div class="form-group col-md-2"> 
      <?php echo $form->labelEx($model,'registration_fees',array('class'=>'control-label')); ?>
       <?php echo $form->textField($model,"registration_fees",array('class'=>'form-control')); ?>
	   <?php echo $form->error($model,'registration_fees'); ?>
   </div>
  </div>
 </div>
	 <div class="box">
		<div class="box-footer">  
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	    </div>
	 </div>

<?php $this->endWidget(); ?>