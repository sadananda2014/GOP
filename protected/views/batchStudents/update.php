<?php
$this->breadcrumbs=array(
	'Batch Students'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BatchStudents', 'url'=>array('index')),
	array('label'=>'Create BatchStudents', 'url'=>array('create')),
	array('label'=>'View BatchStudents', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BatchStudents', 'url'=>array('admin')),
);
?>

<h1>Update BatchStudents <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>