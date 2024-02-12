<?php
$this->breadcrumbs=array(
	'Assign Kits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AssignKit', 'url'=>array('index')),
	array('label'=>'Create AssignKit', 'url'=>array('create')),
	array('label'=>'View AssignKit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AssignKit', 'url'=>array('admin')),
);
?>

<h1>Update AssignKit <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>