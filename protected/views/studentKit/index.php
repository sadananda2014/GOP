<?php
/* @var $this StudentKitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student Kits',
);

$this->menu=array(
	array('label'=>'Create StudentKit', 'url'=>array('create')),
	array('label'=>'Manage StudentKit', 'url'=>array('admin')),
);
?>

<h1>Student Kits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
