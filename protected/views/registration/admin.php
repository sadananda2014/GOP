<?php
$this->breadcrumbs=array(
  'Registrations'=>array('index'),
  'Manage',
);

$this->menu=array(
  array('label'=>'List Registration', 'url'=>array('index')),
  array('label'=>'Create Registration', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('registration-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<h1>Manage Registrations</h1>
</section>
<section class="content">
<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
  //'model'=>$model,
//)); ?>
</div>--><!-- search-form -->
<a href="<?php echo Yii::app()->request->baseUrl; ?>index.php?r=batchStudents/createbatch" class="btn btn-primary pull-right"> Assign Batch >> </a><br/><br/>
<div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
     </div><!-- /.box-header -->
    <div class="box-body table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'registration-grid',
  'itemsCssClass' => 'table table-bordered table-striped',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
    'register_id',
    //'enquiry_id',
    'name',
    'last_name',
    'dob',
    //'gender',
    'age',
    'primary_contact_person',
    'fathers_name',
    'fathers_phone',
    'mothers_name',
    'mothers_phone',
    'student_status',
    /*
    'class',
    'weight',
    'height',
    'blood_group',
    'uniform_size',
    'past_training_experience',
    'represented_team',
    'school',
    'medical_conditions',
    'image',
    'full_address',
    'pincode',
    'trainee_phone',
    'trainee_email',
    'residence_phone',
    'primary_contact_person',
    'emergency_contact',
    'fathers_name',
    'fathers_phone',
    'fathers_email',
    'mothers_name',
    'mothers_phone',
    'mothers_email',
    */

    array(
      'class'=>'CButtonColumn',
      'template'=>'{view}{update}{active}{deactive}',
      'buttons'=>array
    (
        'active' => array
        (
            'label'=>'Active',
             'imageUrl'=>Yii::app()->request->baseUrl.'/img/active.png',  // make sure you have an image
      'visible'=>'$data->student_status == "Deactive"',  
        'url'=>'Yii::app()->createUrl("registration/active", array("id"=>$data->register_id))',
             'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("registration-grid")}')),
    ),
    'deactive' => array
        (
            'label'=>'Deactive',
             'imageUrl'=>Yii::app()->request->baseUrl.'/img/deactive.png',  // make sure you have an image
             'visible'=>'$data->student_status == "Active"',  
       'url'=>'Yii::app()->createUrl("registration/deactive", array("id"=>$data->register_id))',
             'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("registration-grid")}')),
      
    ),
    ),
  ),
  ),
)); ?>
</div><!-- /.box-body -->
  </div><!-- /.box -->
    </div>
      </div>