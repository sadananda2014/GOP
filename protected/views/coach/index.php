<?php
$this->breadcrumbs=array(
	'Coaches',
);

$this->menu=array(
	array('label'=>'Create Coach', 'url'=>array('create')),
	array('label'=>'Manage Coach', 'url'=>array('admin')),
);
?>

<h1>Coaches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
