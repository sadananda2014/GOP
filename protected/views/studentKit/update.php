<?php
/* @var $this StudentKitController */
/* @var $model StudentKit */

$this->breadcrumbs=array(
	'Student Kits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentKit', 'url'=>array('index')),
	array('label'=>'Create StudentKit', 'url'=>array('create')),
	array('label'=>'View StudentKit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentKit', 'url'=>array('admin')),
);
?>

<h1>Update StudentKit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'models'=>$models)); ?>