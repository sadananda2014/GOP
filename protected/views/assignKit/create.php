<?php
$this->breadcrumbs=array(
	'Assign Kits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AssignKit', 'url'=>array('index')),
	array('label'=>'Manage AssignKit', 'url'=>array('admin')),
);
?>

<h1>Create AssignKit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>