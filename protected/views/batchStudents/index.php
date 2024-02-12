<?php
$this->breadcrumbs=array(
	'Batch Students',
);

$this->menu=array(
	array('label'=>'Create BatchStudents', 'url'=>array('create')),
	array('label'=>'Manage BatchStudents', 'url'=>array('admin')),
);
?>

<h1>Batch Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
