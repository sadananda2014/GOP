<?php
/* @var $this JersyController */
/* @var $model Jersy */

$this->breadcrumbs=array(
	'Jersies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jersy', 'url'=>array('index')),
	array('label'=>'Manage Jersy', 'url'=>array('admin')),
);
?>

<h1>Create Jersy</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>