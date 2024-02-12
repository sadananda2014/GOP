<?php
$this->breadcrumbs=array(
	'Kit Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KitItems', 'url'=>array('index')),
	array('label'=>'Manage KitItems', 'url'=>array('admin')),
);
?>

<h1>Create KitItems</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>