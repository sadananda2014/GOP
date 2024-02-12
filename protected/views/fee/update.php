<?php
$this->breadcrumbs=array(
	'Fees'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fee', 'url'=>array('index')),
	array('label'=>'Create Fee', 'url'=>array('create')),
	array('label'=>'View Fee', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Fee', 'url'=>array('admin')),
);
?>

<h1>Update Fee <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>