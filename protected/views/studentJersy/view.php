<?php
/* @var $this StudentJersyController */
/* @var $model StudentJersy */

$this->breadcrumbs=array(
	'Student Jersies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudentJersy', 'url'=>array('index')),
	array('label'=>'Create StudentJersy', 'url'=>array('create')),
	array('label'=>'Update StudentJersy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentJersy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentJersy', 'url'=>array('admin')),
);
?>

<h1>View StudentJersy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'brand_id',
		'color_id',
		'size_id',
		'jersy_id',
		'date_assigned',
		'date_delivery',
		'status',
	),
)); ?>
