<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->payment_id,
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Update Payment', 'url'=>array('update', 'id'=>$model->payment_id)),
	array('label'=>'Delete Payment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->payment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>View Payment #<?php echo $model->payment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'payment_id',
		'student_id',
		'payment_date',
		'joined_date',
		'course_id',
		'total_fee',
		'pay_now',
		'balnce',
		'reciept_no',
		'status',
		'mode_of_payment',
	),
)); ?>
