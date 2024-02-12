<?php
$this->breadcrumbs=array(
	'Coaches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coach', 'url'=>array('index')),
	array('label'=>'Manage Coach', 'url'=>array('admin')),
);
?>

<h1>Create Coach</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>