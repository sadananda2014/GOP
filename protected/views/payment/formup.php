<script>
$(document).ready(function(){
  
  $( "#payment_date" ).change(function() {
    // alert( "Handler for .change() called." );
      var dateString = $("#payment_date").val(); // date string
      var coursetime = $( "#Payment_course_id option:selected" ).text().replace ( /[^\d.]/g, '' );
      if(coursetime==""){ coursetime=0; }
      var courset = parseInt(coursetime) + 1;
    // alert(courset);
      var actualDate = new Date(dateString); // convert to actual date
      var newDate = new Date(actualDate.getFullYear(), actualDate.getMonth() + courset, actualDate.getDate())
      var day = newDate.getDate();
      var month = newDate.getMonth() ;
      var year = newDate.getFullYear();
      if (day < 10) {
        day = "0" + day;
      }
      if (month < 10) {
        month = "0" + month;
      }
      var date = year + "-" + month + "-" + day;
      $( "#payment_due_date" ).val(date);
      //alert(futDate);
    });
    
   
	
	$("input.pay_now" ).on("change",function() {
                var sum=0;				
				//alert(0);
				 var total= $("#Payment_total_fee").val();
				 $(".pay_now").each(function(){
				if($(this).val() != "")
				  sum += parseInt($(this).val());   
			});
              if(sum<=total)
				{
				  balance=total-sum;
				  $("#Payment_balnce").val(balance);
				}
				else
				{
				  $(this).val("0");
				  alert("please enter the correct amount");
				}
				
				if(balance===0)
				   {
					 $("#Payment_status").val("paid");
				   }
				   else
				   { 
					 $("#Payment_status").val("pending");
				   }
				
		   });
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
  'id'=>'payment-form',
  'enableAjaxValidation'=>false,
)); ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>
 
 <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Payment</h3>
      <div class="box-title pull-right" id="due"> </div>
        </div><!-- /.box-header -->
       <div class="box-header">
	   
    <div class="form-group col-md-6">
		<label><?php echo $form->labelEx($model,'student_id'); ?></label>
		<?php echo $form->dropDownList($model,'student_id',CHtml::listData(Registration::model()->findAll("student_status='Active'"), 'register_id', 'name'),array('empty'=>'Select Student','class'=>'form-control','required'=>'required')); ?>
		<?php echo $form->error($model,'student_id'); ?>
   </div>
    
  <div class="form-group col-md-6">
  
    <label><?php echo $form->labelEx($model,'course_id'); ?></label>
   <div style="display:none" >
  <?php echo $form->dropDownList($model,'course_id',CHtml::listData(Fee::model()->findAll(), 'id', 'duration'),array('empty'=>'Select Course','class'=>'form-control','required'=>'required','ajax'=>array(
                     'type'=>'POST',
                      'url' => CController::createUrl('payment/course'),
                       'data'=> array('selected_code'=>'js: $(this).val()'),
                     'success' => 'js:function(result) {
                                             $("#Payment_total_fee").val(result);
                                      }'
                                 ))); ?>
		</div>						 
	<input type="text" value="<?php echo Fee::model()->findByPk($model->course_id)->description ?>" class="form-control"  disabled /> 							 
    <?php echo $form->error($model,'course_id'); ?>
	
	
  </div>
   

  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'joined_date'); ?></label>
    <?php echo $form->textField($model,'joined_date',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'joined_date'); ?>
  </div>

  <div class="form-group col-md-6">
      <label><?php echo $form->labelEx($model,'total_fee'); ?></label>
      <?php echo $form->textField($model,'total_fee',array('class'=>'form-control')); ?>
      <?php echo $form->error($model,'total_fee'); ?>
  </div>

  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'payment_date'); ?></label>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'payment_date',
                'name'=>'payment_date',
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
                  //'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              )); ?>
    <?php echo $form->error($model,'payment_date'); ?>
  </div>
 
 <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'reciept_no'); ?></label>
    <?php echo $form->textField($model,'reciept_no',array('size'=>60,'maxlength'=>60,'class'=>'form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'reciept_no'); ?>
 </div>
  
 <div  class="col-md-12 callout callout-info">
   <?php foreach($models as $i=>$model): ?>
   
   <div class="form-group col-md-6">
   
    <label><?php  echo $form->labelEx($model,'paid_month'); ?></label>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model, 
                'attribute'=>"[$i]paid_month",
                'name'=>"[$i]paid_month",
                'value'=>date('Y-m-d'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				   'changeMonth'=>true,
				  'changeYear'=>true,
                  'dateFormat' => 'M-yy',
                  'showButtonPanel'=>true,
                  //'maxDate'=>"+0D",
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
                  'readonly'=>true,
                  //'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              )); ?>
  </div>
  
  
  <div class="form-group col-md-6">
  
    <label><?php echo $form->labelEx($model,'pay_now'); ?></label>
    <?php echo $form->textField($model,"[$i]pay_now",array('class'=>'pay_now form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'pay_now'); ?>
	
   </div>
  <?php endforeach; ?>
  </div>

  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'mode_of_payment'); ?></label>
    <?php $payment_types = array('demand_draft' => 'Demand draft', 'cash' => 'Cash', 'cheque' => 'Cheque', 'neft' => 'NEFT');
         echo $form->dropDownList($model,'mode_of_payment',$payment_types,array('empty'=>'Select Mode Of Payment','class'=>'form-control','required'=>'required')); ?>
    <?php echo $form->error($model,'mode_of_payment'); ?>
  </div>
  
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'balnce'); ?></label>
    <?php echo $form->textField($model,'balnce',array('class'=>'form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'balnce'); ?>
  </div>
  
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'status'); ?></label>
    <?php  //$status_types = array('pending' => 'Pending', 'paid' => 'Paid');
         //echo $form->dropDownList($model,'status',$status_types ,array('empty'=>'Select Status','class'=>'form-control')); 
             echo $form->textField($model,'status',array('size'=>60,'maxlength'=>60,'class'=>'form-control','required'=>'required'));?>
    <?php echo $form->error($model,'status'); ?>
  </div>
  
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'reference'); ?></label>
    <?php echo $form->textField($model,'reference',array('size'=>60,'maxlength'=>60,'class'=>'form-control'));?>
    <?php echo $form->error($model,'reference'); ?>
  </div>
  
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'notes'); ?></label>
    <?php echo $form->textArea($model,'notes',array('size'=>60,'maxlength'=>60,'class'=>'form-control'));?>
    <?php echo $form->error($model,'notes'); ?>
  </div>
  
  <div class="form-group col-md-12">
    <label><?php echo $form->labelEx($model,'payment_due_date'); ?></label>
    <?php  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'payment_due_date',
                'name'=>'payment_due_date',
                'value'=>date('Y-m-d'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                  'dateFormat' => 'yy-mm-dd',
                  'showButtonPanel'=>true,
                  'minDate'=>"-0D",
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
                  'readonly'=>true,
				  'required'=>'required',
                  //'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              ));?> 
    <?php echo $form->error($model,'payment_due_date'); ?>
	
    <?php echo $form->hiddenField($model,'transaction_no',array('size'=>60,'maxlength'=>60,'class'=>'form-control'));?>
  </div>
  
 
	
   </div>
    <div class="box-footer">  
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','confirm'=>'Are you sure with Payment Due Date ?')); ?>
   </div>
  </div>
  
 </div>
    
    

<?php $this->endWidget(); ?>

</div><!-- form -->