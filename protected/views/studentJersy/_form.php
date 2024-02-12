<script >  
  $(document).ready(function() {
    //alert(0);
    $("#StudentJersy_student_id").select2();
    $('select.mysize').on('change', function(e) {
          e.preventDefault();
          var id = $(this).attr('id').match(/\d+/)[0];
          
          var size=$("#StudentJersy_"+id+"_size_id").val();
          var color=$("#StudentJersy_"+id+"_color_id").val();
          var brand=$("#StudentJersy_"+id+"_brand_id").val();
          //var item=$("#StudentKit_item_id").val();
          
          if(size !="" && color !="" && brand !="")
            {
            
              //alert(item);
            
            $.ajax({
                       url: "index.php?r=studentJersy/checkavl",
                       type: 'POST',
                       data: {size: size,color: color,brand:brand},
                       cache: false,
                       success: function(data) {
                              if(data==1){
                                $("#avl"+id).val("Jersy Available ");
                                
                              }
                              else
                              {
                                $("#avl"+id).val("Jersy Not Available");
                                }
                         //alert("Success")                                          
                      },
                       error: function(){
                         alert("Fail")
                       }
                 });
            
            }
          else
           {
             $('#jerror').text("Please select Brand and Color of the Jersy");
            //alert("Please select Brand and Color of the item");  
            var size=$("#StudentJersy_"+id+"size_id").val(" ");
           }
        
    });      
  });
</script>  

<?php
/* @var $this StudentJersyController */
/* @var $model StudentJersy */
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
  'id'=>'student-jersy-form',
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
       <h3 class="box-title">Assign Jersy</h3>  <br />
                                        
     </div><!-- /.box-header -->
   <p id="jerror" style="color:red;font-size:15px;">  </p>   
     <div class="box-body table-responsive">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
    <tr>
            <th><?php echo $form->labelEx($model,'brand_id'); ?> </th>
      <th><?php echo $form->labelEx($model,'color_id'); ?> </th>
      <th><?php echo $form->labelEx($model,'size_id'); ?> </th>
      <th><?php echo $form->labelEx($model,'date_assigned'); ?> </th>
      <th><?php echo $form->labelEx($model,'date_delivery'); ?> </th>
      <th><?php echo $form->labelEx($model,'status'); ?> </th>
      <th>Availability</th>
    </tr>
      </thead>
      <br/><br/>
          <tbody>
   
    <?php echo $form->labelEx($model,'student_id'); ?>
    <?php echo $form->dropDownList($model,"student_id",Registration::model()->get_active_students_lists_search(),array('empty'=>'Select','required'=>'required','class'=>'form-control')); ?>
    <?php echo $form->error($model,'student_id'); ?>
  <?php $ctn=count($model); echo "count".$ctn++; 
  for($i=1;$i<=2;$i++) {?>
  <tr>  
     <td><a>  <?php echo $form->dropDownList($model,"[$i]brand_id",Inventory::model()->getBrandId(),array('empty'=>'Select','class'=>'form-control')); ?>
    <?php echo $form->error($model,'brand_id'); ?></a></td>
  
    
    <td><a> <?php echo $form->dropDownList($model,"[$i]color_id",Inventory::model()->getColorId(),array('empty'=>'Select','class'=>'form-control')); ?>
    <?php echo $form->error($model,'color_id'); ?></a></td>
  
  
    
    <td><a><?php echo $form->dropDownList($model,"[$i]size_id",Inventory::model()->getSizeId(),array('empty'=>'Select','class'=>'mysize form-control','required'=>'required')); ?>
    <?php echo $form->error($model,'size_id'); ?></a></td>
  
  
    <!--<td><a><?php echo $form->labelEx($model,'jersy_id'); ?>
    <?php echo $form->textField($model,'jersy_id',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->error($model,'jersy_id'); ?></a></td>-->
  
  
    
    <td><a><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>"[$i]date_assigned",
                'name'=>"[$i]date_assigned",
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
                  'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              )); ?>
    <?php echo $form->error($model,'date_assigned'); ?></a></td>
  
  
    
    <td><a><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>"[$i]date_delivery",
                'name'=>"[$i]date_delivery",
                'value'=>date('Y-m-D'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                  'dateFormat' => 'yy-mm-dd',
                  'showButtonPanel'=>true,
                  'maxDate'=>"+20D",
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
                  //'readonly'=>true,
                  //'value'=>CTimestamp::formatDate('Y-m-d'),
                ),
              )); ?>
    <?php echo $form->error($model,'date_delivery'); ?></a></td>
  
  
    
    <td><a>
    <?php $status_type = array('no_stock' => 'No Stock', 'print' => 'Print', 'delivered' => 'Delivered'); ?>
    
    <?php echo $form->dropDownList($model,"[$i]status",$status_type,array('empty'=>'Select Status','class'=>'form-control','required'=>'required')); ?>
    <?php echo $form->error($model,'status'); ?></a></td>

    <td><a><input type="text" id="avl<?php echo $i; ?>" readonly="readonly" class="form-control"></a></td>
  </tr>
  <?php } ?>
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

