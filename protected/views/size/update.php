<?php
/* @var $this SizeController */
/* @var $model Size */

$this->breadcrumbs=array(
	'Sizes'=>array('index'),
	$model->size_id=>array('view','id'=>$model->size_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Size', 'url'=>array('index')),
	array('label'=>'Create Size', 'url'=>array('create')),
	array('label'=>'View Size', 'url'=>array('view', 'id'=>$model->size_id)),
	array('label'=>'Manage Size', 'url'=>array('admin')),
);
?>

<h1>Update Size <?php echo $model->size_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>