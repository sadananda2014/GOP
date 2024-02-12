<?php
/* @var $this StudentKitController */
/* @var $model StudentKit */

$this->breadcrumbs=array(
	'Student Kits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentKit', 'url'=>array('index')),
	array('label'=>'Manage StudentKit', 'url'=>array('admin')),
);
?>

<h1>Assign StudentKit</h1>

<?php $this->renderPartial('_form1', array('model'=>$model,'models'=>$models)); ?>
