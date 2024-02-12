
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
	'id'=>'attendance-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="col-xs-12" id="atdtop">
          <div class="box box-primary">
             <div class="box-header">
               <h3 class="box-title">Attendance</h3>
             </div><!-- /.box-header -->
                                <!-- form start -->
	   <div class="box-body">
         <div class="form-group">
		      <label>Select Center</label>
             <?php  echo CHtml::dropDownList('Center', '', CHtml::listData(Center::model()->findAll(), 'id', 'center_name'),array('empty'=>'Select','class'=>'form-control',
						  'ajax' => array(
                          'type' => 'POST',
						  'data'=> 'js:{"ctr": $("#Center").val() }',
                          'url' => CController::createUrl('batchids'),
                          'update' => '#batch',
                          
                                          )));?>
           </div>
		 
		 <div class="form-group">
		      <label>Select Batch</label>
             <?php  echo CHtml::dropDownList('batch', '',array('prompt'=>'Select Batch'),array('class'=>'form-control'));?>
           </div>
		   
		<div class="form-group">
		      <label>Select Date</label>   
		   <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'date',
                'name'=>'date',
                'value'=>date('Y-m-D'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'blind',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                  'dateFormat' => 'yy-mm-dd',
                  'showButtonPanel'=>true,
                  'maxDate'=>"+0D",
				  'changeMonth'=>true,
                  'changeYear'=>true,
				  'yearRange'=>'1995:2030',
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
                  'readonly'=>true,
                ),
              ));  ?>
		 </div>  
		 <div class="box-footer">  
			 <?php
						echo CHtml::ajaxButton('Update',Yii::app()->createUrl('attendance/Atcheck'),
                    array(
                        'type'=>'POST',
                        'data'=> 'js:{"data1": $("#batch").val(),"date": $("#date").val() }', 
						'beforeSend'=>'js:function(){ if($("#batch").val()=="" || $("#Center").val()=="" || $("#date").val()=="" ) { alert("select values"); xhr.abort();}  }',	
                        'success'=>'js:function(string){ if(string==""){window.location = "index.php?r=attendance/attupdate&batch=" + $("#batch").val() + "&date="+ $("#date").val()} else {alert("taken")} }'           
                    ),array('class'=>'btn btn-primary',)); 
				?>							
             </div>
		  </div>	 
	   </div>	
   </div>		
   
   <br/>
<?php if(isset($_GET['batch'])) { ?>		
<div class="row">
 
  <div class="col-xs-12">                      
   <div class="box">
     <div class="box-header">
       <h3 class="box-title">Batch-<?php if(isset($_GET['batch'])){echo $_GET['batch'];} ?> Students</h3>  <br />
         <span class="pull-right"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-warning')); ?></span>                                  
     </div><!-- /.box-header -->
     <div class="box-body table-responsive">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
           <th>Student Name</th>
           <th>Batch</th>
           <th>Status </th>
          </tr>
        </thead>
          <tbody>
        <?php foreach($models as $i=>$model1): ?>
			<tr>
               <td><a><?php echo CHtml::encode(Registration::model()->findByPk((int)$model1->student_id)->name); ?></a></td>
               <td><a><?php echo CHtml::encode(Batch::model()->findByPk((int)$model1->batch_id)->batch_name); ?></a></td>
               <td><a><?php echo $form->checkBox($model,"[$i]status",array('value'=>'Present' ,'uncheckValue' =>'Absent','class'=>'example')); ?></a></td>
            </tr>
		<?php endforeach; ?>
		  </tbody>	
		</table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
   </div>
  </div>  
<?php } $this->endWidget(); ?>

