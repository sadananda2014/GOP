<?php
/* @var $this StudentJersyController */
/* @var $model StudentJersy */

$this->breadcrumbs=array(
	'Student Jersies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentJersy', 'url'=>array('index')),
	array('label'=>'Create StudentJersy', 'url'=>array('create')),
	array('label'=>'View StudentJersy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentJersy', 'url'=>array('admin')),
);
?>

<h1>Update StudentJersy <?php echo $model->id; ?></h1>

<?php $this->renderPartial('formup', array('model'=>$model,'models'=>$models)); ?>