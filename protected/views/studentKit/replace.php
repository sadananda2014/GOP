<script >  
  $(document).ready(function() {
    //alert(0);
    
    $('select.mysize').on('change', function(e) {
          e.preventDefault();
          var id = $(this).attr('id').match(/\d+/)[0];
      //alert(id);
          var size=$("#StudentKit_"+id+"_size_id").val();
          var color=$("#StudentKit_"+id+"_color_id").val();
          var brand=$("#StudentKit_"+id+"_brand_id").val();
          var item=$("#StudentKit_"+id+"_item_id").val();
          
          if(size !="" && color !="" && brand !="" && item!="")
            {
            
              //alert(item);
            
            $.ajax({
                       url: "index.php?r=studentKit/checkavl",
                       type: 'POST',
                       data: {size: size,color: color,brand:brand,item:item},
                       cache: false,
                       success: function(data) {
                              if(data==1){
                                $("#avl"+id).val("Item Available ");
                                $("#StudentKit_"+id+"_status").prop("disabled", false);
                              }
                              else
                              {
                                $("#StudentKit_"+id+"_status").prop("disabled", true);
                                $("#avl"+id).val("Item Not Available");
                                }
                         //alert("Success")                                          
                      },
                       error: function(){
                         alert("Something went wrong try again")
                       }
                 });
            
            }
          else
           {
            alert("Please select Brand and Color of the item");  
            var size=$("#StudentKit_"+id+"_size_id").val(" ");
           }
        
    });      
  });
</script>  

<?php
/* @var $this StudentKitController */
/* @var $model StudentKit */
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
  'id'=>'student-kit-form',
  'enableClientValidation'=>true,
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
)); ?>
<div class="row">
 
  <div class="col-xs-12">                      
   <div class="box">
     <div class="box-header">
       <h3 class="box-title">Assign Kit</h3>  <br />
                                           
     </div><!-- /.box-header -->
     <div class="box-body table-responsive">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
           <th><?php echo $form->labelEx($model,'item_id'); ?></th>
           <th><?php echo $form->labelEx($model,'brand_id'); ?></th>
           <th><?php echo $form->labelEx($model,'color_id'); ?> </th>
       <th><?php echo $form->labelEx($model,'size_id'); ?></th>
       <th><?php echo $form->labelEx($model,'status'); ?><br/><small>mark to delivery</small></th>
       <th>Availability</th>
	    <th>Replacement fees</th>
          </tr>
        </thead>
          <tbody>
  <p class="note">Fields with <span class="required">*</span> are required.</p>

  <?php //echo $form->errorSummary($model); ?>

    <?php echo $form->labelEx($model,'student_id'); ?>
    <?php echo $form->dropDownList($model,"student_id",Registration::model()->get_active_students_lists_search(),array('empty'=>'Select','required'=>'required','class'=>'form-control')); ?>
    <?php echo $form->error($model,'student_id'); ?>
    <br/><?php $ctn=count($models); 
	//echo "count".$ctn;?>
 <?php for($i=1;$i<=$ctn;$i++): ?>
     <tr>     
           
    <td><a><?php echo $form->dropDownList($model,"[$i]item_id",CHtml::listData(Item::model()->findAll(), 'item_id', 'item_name'),array('class'=>'form-control','readonly'=>true)); ?>
    <?php echo $form->error($model,'item_id'); ?></a></td>
        
    
    <td><a><?php echo $form->dropDownList($model,"[$i]brand_id",Inventory::model()->getBrandId(),array('empty'=>'Select','class'=>'form-control')); ?>
    <?php echo $form->error($model,'brand_id'); ?></a></td>
  

  
    
    <td><a><?php echo $form->dropDownList($model,"[$i]color_id",Inventory::model()->getColorId(),array('empty'=>'Select','class'=>'form-control')); ?>
    <?php echo $form->error($model,'color_id'); ?></a></td>
  
  
    <?php if($i==1) { ?>
    <td><a><?php echo $form->dropDownList($model,"[$i]size_id",Inventory::model()->getSizeId(),array('empty'=>'Select','class'=>'mysize form-control','required'=>'required')); ?>
    <?php echo $form->error($model,'size_id'); ?></a></td>
    <?php } else { ?>
	
     <td><a><?php echo $form->dropDownList($model,"[$i]size_id",Inventory::model()->getSizeId(),array('empty'=>'Select','class'=>'mysize form-control')); ?>
    <?php echo $form->error($model,'size_id'); ?></a></td>  <?php } ?>
  
    <!--<?php echo $form->labelEx($model,'inventory_id'); ?>
    <?php echo $form->textField($model,'inventory_id',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->error($model,'inventory_id'); ?>
  

  
    <?php echo $form->labelEx($model,'date'); ?>
    <?php echo $form->textField($model,'date',array('size'=>30,'maxlength'=>30)); ?>
    <?php echo $form->error($model,'date'); ?>-->
  

  
    
    <td><a><?php echo $form->checkBox($model,"[$i]status",array('value'=>'Delivery' ,'uncheckValue' =>'Pending','class'=>'form-control')); ?>
    <?php echo $form->error($model,'status'); ?></a></td>
  
    <td><a><input type="text" id="avl<?php echo $i; ?>" readonly="readonly" class="form-control"></a></td>
     <?php if($i==1) { ?>
	 <td><a><?php echo $form->textField($model,"[$i]replacement_fees",array('empty'=>'Select','class'=>'form-control','required'=>'required')); ?>
	 <?php } else { ?>
	 <td><a><?php echo $form->textField($model,"[$i]replacement_fees",array('empty'=>'Select','class'=>'form-control')); }?>
    <?php echo $form->error($model,'replacement_fees'); ?></a></td>
	
     </tr>
  
 <?php endfor; ?>
 </tbody>  
    </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
   </div>
  </div> 
  <div >
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
