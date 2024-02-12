<?php
/* @var $this InventoryHistoryController */
/* @var $model InventoryHistory */

$this->breadcrumbs=array(
	'Inventory Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InventoryHistory', 'url'=>array('index')),
	array('label'=>'Create InventoryHistory', 'url'=>array('create')),
	array('label'=>'Update InventoryHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InventoryHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InventoryHistory', 'url'=>array('admin')),
);
?>

<h1>View InventoryHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_id',
		'brand_id',
		'color_id',
		'size_id',
		'quantity',
		'date',
	),
)); ?>
