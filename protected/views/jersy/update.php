<?php
/* @var $this JersyController */
/* @var $model Jersy */

$this->breadcrumbs=array(
	'Jersies'=>array('index'),
	$model->jersy_id=>array('view','id'=>$model->jersy_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jersy', 'url'=>array('index')),
	array('label'=>'Create Jersy', 'url'=>array('create')),
	array('label'=>'View Jersy', 'url'=>array('view', 'id'=>$model->jersy_id)),
	array('label'=>'Manage Jersy', 'url'=>array('admin')),
);
?>

<h1>Update Jersy <?php echo $model->jersy_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>