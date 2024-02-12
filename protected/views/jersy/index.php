<?php
/* @var $this JersyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jersies',
);

$this->menu=array(
	array('label'=>'Create Jersy', 'url'=>array('create')),
	array('label'=>'Manage Jersy', 'url'=>array('admin')),
);
?>

<h1>Jersies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
