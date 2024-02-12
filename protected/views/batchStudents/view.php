<?php
$this->breadcrumbs=array(
	'Batch Students'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BatchStudents', 'url'=>array('index')),
	array('label'=>'Create BatchStudents', 'url'=>array('create')),
	array('label'=>'Update BatchStudents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BatchStudents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BatchStudents', 'url'=>array('admin')),
);
?>

<h1>View BatchStudents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'student_name',
		'batch_id',
	),
)); ?>
