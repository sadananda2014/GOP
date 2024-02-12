<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->payment_id=>array('view','id'=>$model->payment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'View Payment', 'url'=>array('view', 'id'=>$model->payment_id)),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>Update Payment <?php echo $model->payment_id; ?></h1>

<?php echo $this->renderPartial('formup', array('model'=>$model,'models'=>$models)); ?>