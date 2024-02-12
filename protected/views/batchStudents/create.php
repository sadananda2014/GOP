<?php
$this->breadcrumbs=array(
	'Batch Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BatchStudents', 'url'=>array('index')),
	array('label'=>'Manage BatchStudents', 'url'=>array('admin')),
);
?>

<h1>Create BatchStudents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>