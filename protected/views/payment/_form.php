<script>
$(document).ready(function(){
  $("#Payment_student_id ").select2();
first_balance=$("#Payment_balnce").val();
  $("#Payment_pay_now").keyup(function(){
    totalamt=$("#Payment_total_fee").val();
      paidamt=$("#Payment_pay_now").val();
    balanceamt=  totalamt-paidamt;
    if(balanceamt>=0)
    {
      $("#Payment_balnce").val(balanceamt);
    }
    else
    {
        alert("Please enter the correct amount");
      $("#Payment_pay_now").val("");
      $("#Payment_balnce").val(first_balance);
    }
   
   if(balanceamt===0)
   {
     $("#Payment_status").val("paid");
   }
   else
   { 
     $("#Payment_status").val("pending");
   }
    });
  
  $( "#payment_date" ).change(function() {
     //alert( "Handler for .change() called." );
      var dateString = $("#payment_date").val(); // date string
     coursetime = $( "#Payment_course_id" ).val();
     if(coursetime!=""){
    $.ajax({
                       url: "index.php?r=Payment/Duration",
                       type: 'POST',
                       data: {course_id: coursetime},
                       cache: false,
                       success: function(data) {
                //alert(data);
                              var courset = parseInt(data);
                courset=courset+1;
                              //alert(courset);
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
                $( "#payment_due_date" ).val(date);//alert("Success")                                          
                      },
                       error: function(){
                         alert("Fail")
                       }
                 });}
    });
    
  $( "#Payment_course_id" ).change(function() {
      var dateString = $("#payment_date").val(); // date string
      
      coursetime = $( "#Payment_course_id" ).val();
     if(coursetime!=""){
    $.ajax({
                       url: "index.php?r=Payment/Duration",
                       type: 'POST',
                       data: {course_id: coursetime},
                       cache: false,
                       success: function(data) {
                //alert(data);
                              var courset = parseInt(data);
                courset=courset+1;
                             //alert(courset);
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
                $( "#payment_due_date" ).val(date);//alert("Success")   
                
                               var max_fields      = 10; //maximum input boxes allowed
      var wrapper         = $(".input_fields_wrap"); //Fields wrapper
      var add_button      = $(".add_field_button"); //Add button ID
    
    for(i=1;i<=10;i++) {
       $(".remove_field").remove(); 
    }
    
    var x = 1;
    //alert(x);
    for(i=1;i<=courset;i++) {
        if(x < max_fields){ //max input box allowed
            //text box increment  
            if(i==courset)
                { 
              $(wrapper).append('<div class="remove_field" style="padding-bottom:5px;"><label>Paid Month</label><input type="text" id="Payment_'+x+'_paid_month" name="Payment['+x+'][paid_month]" class="paydate" style="margin-right:8px;"/><label>Pay now</label><input type="text" id="Payment_'+x+'_pay_now" name="Payment['+x+'][pay_now]"class="pay_now" /></div>');
                }
            else{
                $(wrapper).append('<div class="remove_field" style="padding-bottom:5px;"><label>Paid Month</label><input type="text" id="Payment_'+x+'_paid_month" name="Payment['+x+'][paid_month]" class="paydate" required="required" style="margin-right:8px;"/><label>Pay now</label><input type="text" id="Payment_'+x+'_pay_now" name="Payment['+x+'][pay_now]"class="pay_now" required="required"/></div>'); //add input box
                }
      x++; 
      
        }
    }
    
  /*  $('.paydate').datepicker({
      format: "YYYY-mm"
    });*/
    $('.paydate').datepicker({
                dateFormat: 'M-yy',
        changeMonth:true,
        changeYear:true
            })
      
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
                  
                      },
                       error: function(){
                         alert("Fail")
                       }
                 }); 
    
    
      
      }
    });  
  
  
  
  
  //--------------------------------------------------------------------------------------------------//
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
  
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
   
  
  
  //======================================================================================================//
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

  <?php //echo $form->errorSummary($model); ?>
 <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Payment</h3>
      <div class="box-title pull-right" id="due"> </div>
        </div><!-- /.box-header -->
       <div class="box-header">
    <div class="form-group col-md-6"> 
    <label><?php echo $form->labelEx($model,'student_id'); ?></label>
    <?php echo $form->dropDownList($model,'student_id',Registration::model()->get_active_students_lists_search() ,array('empty'=>'Select Student','class'=>'form-control','required'=>'required','ajax'=>array(
                     'type'=>'POST',
                      'url' => CController::createUrl('payment/name'),
                       'data'=> array('selected_code'=>'js: $(this).val()'),
                     'success' => 'js:function(result) 
                    {    
                       var d = new Date(),
                       date = (d.getUTCFullYear())+"-"+(d.getUTCMonth()+1)+"-"+(d.getUTCDate());
                       
                      data1=JSON.parse(result);    
                      if(data1[0].joined_date!="")     { $("#Payment_joined_date").val(data1[0].joined_date);  }   else{ $("#Payment_joined_date").val(""); }  
                      if(data1[0].payment_date!=null)    { $("#payment_date").val(data1[0].payment_date);    }  else{ $("#payment_date").val(date); }  
                      if(data1[0].reciept_no!="")      { $("#Payment_reciept_no").val(data1[0].reciept_no);   }  else{ $("#Payment_reciept_no").val(""); }
                      if(data1[0].mode_of_payment!="") { $("#Payment_mode_of_payment").val(data1[0].mode_of_payment);} else{ $("#Payment_mode_of_payment").val(""); }
                      if(data1[0].course_id!="")     { $("#Payment_course_id").val(data1[0].course_id);     }  else { $("#Payment_course_id").val(" ");}
                      if(data1[0].total_fee!="")       { $("#Payment_total_fee").val(data1[0].total_fee);   }  else{ $("#Payment_total_fee").val(""); }
                      if(data1[0].pay_now!="")       { $("#Payment_pay_now").val(data1[0].pay_now);      }  else{ $("#Payment_pay_now").val(""); }
                      if(data1[0].balnce!="")       { $("#Payment_balnce").val(data1[0].balnce);        }  else{ $("#Payment_balnce").val(""); }
                      if(data1[0].status!="")        { $("#Payment_status").val(data1[0].status);        }  else{ $("#Payment_status").val(""); }
                      $("#payment_due_date").val(data1[0].payment_due_date);
                      // alert(data1[0].payment_due_date);
            var i=1; 
            for(i=1;i<=10;i++) {
                  $(".remove_field").remove(); 
                }
            var wrapper= $(".input_fields_wrap");
            
            var x=1;
            var j=1;
            var cr = parseInt(data1[0].duration);
            cr=cr+1;
            for(j=1;j<=cr;j++) {
            
            if(j==cr)
            {
            $(wrapper).append("<div style=padding-bottom:5px; class=remove_field><label>Paid Month</label><input type=text id=Payment_"+x+"_paid_month name=Payment["+x+"][paid_month] class=paydate style=margin-right:8px;/><label>Pay now</label><input type=text class=pay_now id=Payment_"+x+"_pay_now  name=Payment["+x+"][pay_now]  /></div>");
            }
            else
            {
                  $(wrapper).append("<div style=padding-bottom:5px; class=remove_field><label>Paid Month</label><input type=text id=Payment_"+x+"_paid_month name=Payment["+x+"][paid_month] class=paydate required=required style=margin-right:8px;/><label>Pay now</label><input type=text class=pay_now id=Payment_"+x+"_pay_now  name=Payment["+x+"][pay_now]  required=required /></div>"); 
            }
            x++; 
      
        }
    
    $(".paydate").datepicker({
                dateFormat: "M-yy",
        changeMonth:true,
        changeYear:true
            })
      
      
      $("input.pay_now" ).on("change",function() {
         var sum=0;        
        
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
            
                                      }'
                                 ))); ?>
    <?php echo $form->error($model,'student_id'); ?>
  </div>
    
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'course_id'); ?></label>
    <?php echo $form->dropDownList($model,'course_id',CHtml::listData(Fee::model()->findAll(), 'id', 'description'),array('empty'=>'Select Course','class'=>'form-control','required'=>'required','ajax'=>array(
                     'type'=>'POST',
                      'url' => CController::createUrl('payment/course'),
                       'data'=> array('selected_code'=>'js: $(this).val()'),
                     'success' => 'js:function(result) {
                                             $("#Payment_total_fee").val(result);
                                      }'
                                 ))); ?>
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
                  'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              )); ?>
    <?php echo $form->error($model,'payment_date'); ?>
  </div>
 
   <div class="form-group col-md-6">
  <?php  if(!$model->isNewRecord) { ?>
    <label><?php echo $form->labelEx($model,'pay_now'); ?></label>
    <?php echo $form->textField($model,'pay_now',array('class'=>'form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'pay_now'); } if($model->isNewRecord) {?>
  
  
  <div class="input_fields_wrap">
   
    </div>
  <?php } ?>
   </div>
   
   <?php if(!$model->isNewRecord) { ?>
   <div class="form-group col-md-6">
   
    <label><?php  echo $form->labelEx($model,'paid_month'); ?></label>
    <?php echo $form->textField($model,'paid_month',array('size'=>60,'maxlength'=>60,'class'=>'form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'paid_month'); ?>
  </div>
<?php } ?>
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'reciept_no'); ?></label>
    <?php echo $form->textField($model,'reciept_no',array('size'=>60,'maxlength'=>60,'class'=>'form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'reciept_no'); ?>
  </div>
  
  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'balnce'); ?></label>
    <?php echo $form->textField($model,'balnce',array('class'=>'form-control','autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'balnce'); ?>
  </div>

  <div class="form-group col-md-6">
    <label><?php echo $form->labelEx($model,'mode_of_payment'); ?></label>
    <?php $payment_types = array('demand_draft' => 'Demand raft', 'cash' => 'Cash', 'cheque' => 'Cheque', 'neft' => 'NEFT');
         echo $form->dropDownList($model,'mode_of_payment',$payment_types,array('empty'=>'Select Mode Of Payment','class'=>'form-control','required'=>'required')); ?>
    <?php echo $form->error($model,'mode_of_payment'); ?>
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
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
                  'readonly'=>true,
          'required'=>'required',
                  'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              ));?> 
    <?php echo $form->error($model,'payment_due_date'); ?>
  </div>
  
 
  
   </div>
    <div class="box-footer">  
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','confirm'=>'Are you sure with Payment Due Date ?')); ?>
  </div>
  </div>
  
 </div>
    
    

<?php $this->endWidget(); ?>

</div><!-- form -->