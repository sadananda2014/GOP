<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	$model->batch_id=>array('view','id'=>$model->batch_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Batch', 'url'=>array('index')),
	array('label'=>'Create Batch', 'url'=>array('create')),
	array('label'=>'View Batch', 'url'=>array('view', 'id'=>$model->batch_id)),
	array('label'=>'Manage Batch', 'url'=>array('admin')),
);
?>

<h1>Update Batch <?php echo $model->batch_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>