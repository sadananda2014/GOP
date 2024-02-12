<?php
$this->breadcrumbs=array(
	'Assign Kits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AssignKit', 'url'=>array('index')),
	array('label'=>'Create AssignKit', 'url'=>array('create')),
	array('label'=>'Update AssignKit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AssignKit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AssignKit', 'url'=>array('admin')),
);
?>

<h1>View AssignKit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'batch_students_id',
		'kit_item_id',
		'brand',
		'color',
		'size',
	),
)); ?>
