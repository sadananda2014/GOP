<?php
$this->breadcrumbs=array(
	'Attendances',
);

$this->menu=array(
	array('label'=>'Create Attendance', 'url'=>array('create')),
	array('label'=>'Manage Attendance', 'url'=>array('admin')),
);
?>

<h1>Attendances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
