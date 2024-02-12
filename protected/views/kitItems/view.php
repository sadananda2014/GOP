<?php
$this->breadcrumbs=array(
	'Kit Items'=>array('index'),
	$model->item_id,
);

$this->menu=array(
	array('label'=>'List KitItems', 'url'=>array('index')),
	array('label'=>'Create KitItems', 'url'=>array('create')),
	array('label'=>'Update KitItems', 'url'=>array('update', 'id'=>$model->item_id)),
	array('label'=>'Delete KitItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KitItems', 'url'=>array('admin')),
);
?>

<h1>View KitItems #<?php echo $model->item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_id',
		'item_name',
		'qauntity',
		'status',
	),
)); ?>
