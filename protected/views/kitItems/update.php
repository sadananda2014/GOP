<?php
$this->breadcrumbs=array(
	'Kit Items'=>array('index'),
	$model->item_id=>array('view','id'=>$model->item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KitItems', 'url'=>array('index')),
	array('label'=>'Create KitItems', 'url'=>array('create')),
	array('label'=>'View KitItems', 'url'=>array('view', 'id'=>$model->item_id)),
	array('label'=>'Manage KitItems', 'url'=>array('admin')),
);
?>

<h1>Update KitItems <?php echo $model->item_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>