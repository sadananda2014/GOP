<?php
$this->breadcrumbs=array(
	'Coaches'=>array('index'),
	$model->coach_id,
);

$this->menu=array(
	array('label'=>'List Coach', 'url'=>array('index')),
	array('label'=>'Create Coach', 'url'=>array('create')),
	array('label'=>'Update Coach', 'url'=>array('update', 'id'=>$model->coach_id)),
	array('label'=>'Delete Coach', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->coach_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coach', 'url'=>array('admin')),
);
?>

<h1>View Coach #<?php echo $model->coach_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'coach_id',
		'coach_name',
		'address',
		'phone',
		'email',
	),
)); ?>
