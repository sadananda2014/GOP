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

<h1>Replace StudentKit</h1>

<?php $this->renderPartial('replace', array('model'=>$model,'models'=>$models)); ?>