<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('payment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Payments</h1>
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
<?php if(UserModule::isAdmin()) { ?>
<a title="Click here to get filtered grid report" href="<?php echo Yii::app()->request->baseUrl; ?>index.php?r=Payment/CreateExcel" class="btn btn-danger"> Payment Report </a>
<?php } ?>
<a href="<?php echo Yii::app()->request->baseUrl; ?>index.php?r=studentKit/create" class="btn btn-primary pull-right"> Assign Kit >> </a><br/><br/>

 <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
     </div><!-- /.box-header -->
    <div class="box-body table-responsive">
<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'payment-grid',
	'itemsCssClass' => 'table table-bordered table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'payment_id',
		'transaction_no',
		//'student_id',
		array(			
					  'header'=>'Student Name',		
                      'name'=>'student_id',
                      //'value'=>'$data->operator->operator_name',
					  'value'=>'Registration::model()->findByPk((int)$data->student_id)->name',
                      ),
		'payment_date',
		'payment_due_date',
		'paid_month',
		'pay_now',
		'notes',
		//'course_id',
		array(			
					  'header'=>'Duration',		
                      'name'=>'course_id',
                      //'value'=>'$data->operator->operator_name',
					  'value'=>'Fee::model()->findByPk((int)$data->course_id)->duration',
                      ),
		'total_fee',
		/*
		'pay_now',
		'balnce',
		'reciept_no',
		'status',
		'mode_of_payment',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}{history}',
			'buttons'=>array
    (
        'history' => array
        (
            'label'=>'History',
             'imageUrl'=>Yii::app()->request->baseUrl.'/img/history.png',  // make sure you have an im	
    		'url'=>'Yii::app()->createUrl("payment/history", array("id"=>$data->student_id,))'
		),
		'update' => array(
        'url'=>'Yii::app()->createUrl("payment/update", array("id"=>$data->transaction_no))'
    ),
    
    'delete' => array(
        'url'=>'Yii::app()->createUrl("payment/delete", array("id"=>$data->transaction_no))'
    ),
		),
		),
	),
	'mergeColumns' => array('student_id','payment_date','payment_due_date','notes','course_id','transaction_no','total_fee'),
	'extraRowColumns' => array('transaction_no'),
	'extraRowExpression' => '"<h4>Transaction No. #".$data->transaction_no. "</h4>"',
)); ?>
 </div><!-- /.box-body -->
  </div><!-- /.box -->
    </div>
      </div>