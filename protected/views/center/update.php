<?php
$this->breadcrumbs=array(
	'Centers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Center', 'url'=>array('index')),
	array('label'=>'Create Center', 'url'=>array('create')),
	array('label'=>'View Center', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Center', 'url'=>array('admin')),
);
?>

<h1>Update Center <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>