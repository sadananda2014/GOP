<?php
$this->breadcrumbs=array(
	'Assign Kits',
);

$this->menu=array(
	array('label'=>'Create AssignKit', 'url'=>array('create')),
	array('label'=>'Manage AssignKit', 'url'=>array('admin')),
);
?>

<h1>Assign Kits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
