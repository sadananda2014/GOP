<?php
$this->breadcrumbs=array(
  'Batch Students'=>array('index'),
  'Manage',
);

$this->menu=array(
  array('label'=>'List BatchStudents', 'url'=>array('index')),
  array('label'=>'Create BatchStudents', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('batch-students-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<h1>Manage Batch Students</h1>
</section>
<section class="content">
<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
</div> search-form -->
<a href="<?php echo Yii::app()->request->baseUrl; ?>index.php?r=payment/create" class="btn btn-primary pull-right"> Payment >> </a><br/><br/>

<div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
     </div><!-- /.box-header -->
    <div class="box-body table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'batch-students-grid',
  'itemsCssClass' => 'table table-bordered table-striped',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
    'id',
    'student_id',
    'student_name',
    array(      
            'header'=>'Last Name',
      		 		 'name'=>'student_id',
                         //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->last_name',
                      ),
    array(      
            'header'=>'DOB',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->dob',
                      ),
    array(      
            'header'=>'Pincode',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->pincode',
                      ),
    array(      
            'header'=>'Primary Contact',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->primary_contact_person',
                      ),
    array(      
            'header'=>'Father Name',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->fathers_name',
                      ),
array(      
            'header'=>'Father Phone',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->fathers_phone',
                      ),
array(      
            'header'=>'Mother Name',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->mothers_name',
                      ),
array(      
            'header'=>'Mother Phone',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->mothers_phone',
                      ),
array(      
            'header'=>'School',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->school',
                      ),
    
    //'cycle_of_fee',
array(      
            'header'=>'Cycle of fee',    
                      'name'=>'cycle_of_fee',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Fee::model()->findByPk((int)$data->cycle_of_fee)->description',
                      ),
    
    array(
                      'name'=>'batch_id',
                      'value'=>'$data->batch->batch_name',
                      ),
    'monthly_fee',
    'registration_fees',
    
    array(      
            'header'=>'Status',    
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
            'value'=>'Registration::model()->findByPk((int)$data->student_id)->student_status',
                      ),

    array(
      'class'=>'CButtonColumn',
    ),
  ),
)); ?>
</div><!-- /.box-body -->
  </div><!-- /.box -->
    </div>
      </div>