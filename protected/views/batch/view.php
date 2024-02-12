<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	$model->batch_id,
);

$this->menu=array(
	array('label'=>'List Batch', 'url'=>array('index')),
	array('label'=>'Create Batch', 'url'=>array('create')),
	array('label'=>'Update Batch', 'url'=>array('update', 'id'=>$model->batch_id)),
	array('label'=>'Delete Batch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->batch_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Batch', 'url'=>array('admin')),
);
?>

<h1>View Batch #<?php echo $model->batch_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'batch_id',
		'batch_name',
		'batch_location',
		'batch_timing',
		'coach_id',
	),
)); ?>
