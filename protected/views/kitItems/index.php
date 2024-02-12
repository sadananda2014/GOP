<?php
$this->breadcrumbs=array(
	'Kit Items',
);

$this->menu=array(
	array('label'=>'Create KitItems', 'url'=>array('create')),
	array('label'=>'Manage KitItems', 'url'=>array('admin')),
);
?>

<h1>Kit Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
