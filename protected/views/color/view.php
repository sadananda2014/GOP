<?php
/* @var $this ColorController */
/* @var $model Color */

$this->breadcrumbs=array(
	'Colors'=>array('index'),
	$model->color_id,
);

$this->menu=array(
	array('label'=>'List Color', 'url'=>array('index')),
	array('label'=>'Create Color', 'url'=>array('create')),
	array('label'=>'Update Color', 'url'=>array('update', 'id'=>$model->color_id)),
	array('label'=>'Delete Color', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->color_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Color', 'url'=>array('admin')),
);
?>

<h1>View Color #<?php echo $model->color_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'color_id',
		'color_name',
	),
)); ?>
