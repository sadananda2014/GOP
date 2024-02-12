<?php
/* @var $this JersyController */
/* @var $model Jersy */

$this->breadcrumbs=array(
	'Jersies'=>array('index'),
	$model->jersy_id,
);

$this->menu=array(
	array('label'=>'List Jersy', 'url'=>array('index')),
	array('label'=>'Create Jersy', 'url'=>array('create')),
	array('label'=>'Update Jersy', 'url'=>array('update', 'id'=>$model->jersy_id)),
	array('label'=>'Delete Jersy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->jersy_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jersy', 'url'=>array('admin')),
);
?>

<h1>View Jersy #<?php echo $model->jersy_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'jersy_id',
		'brand_id',
		'color_id',
		'size_id',
		'quantity',
	),
)); ?>
