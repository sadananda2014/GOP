<?php
/* @var $this StudentJersyController */
/* @var $model StudentJersy */

$this->breadcrumbs=array(
	'Student Jersies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentJersy', 'url'=>array('index')),
	array('label'=>'Manage StudentJersy', 'url'=>array('admin')),
);
?>

<h1>Create StudentJersy</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>