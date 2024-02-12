<?php
$this->breadcrumbs=array(
	'Coaches'=>array('index'),
	$model->coach_id=>array('view','id'=>$model->coach_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coach', 'url'=>array('index')),
	array('label'=>'Create Coach', 'url'=>array('create')),
	array('label'=>'View Coach', 'url'=>array('view', 'id'=>$model->coach_id)),
	array('label'=>'Manage Coach', 'url'=>array('admin')),
);
?>

<h1>Update Coach <?php echo $model->coach_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>