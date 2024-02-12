<?php
/* @var $this BatchStudentsController */
/* @var $model BatchStudents */

$this->breadcrumbs=array(
	'Batch Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BatchStudents', 'url'=>array('index')),
	array('label'=>'Manage BatchStudents', 'url'=>array('admin')),
);
?>

<h1>Create BatchStudents</h1>

<?php $this->renderPartial('_form1', array('model'=>$model,'models'=>$models)); ?>
