<?php
/* @var $this StudentKitController */
/* @var $model StudentKit */

$this->breadcrumbs=array(
	'Student Kits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudentKit', 'url'=>array('index')),
	array('label'=>'Create StudentKit', 'url'=>array('create')),
	array('label'=>'Update StudentKit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentKit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentKit', 'url'=>array('admin')),
);
?>

<h1>View StudentKit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'item_id',
		'brand_id',
		'color_id',
		'size_id',
		'inventory_id',
		'date',
		'status',
	),
)); ?>
