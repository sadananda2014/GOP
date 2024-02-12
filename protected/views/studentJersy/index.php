<?php
/* @var $this StudentJersyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student Jersies',
);

$this->menu=array(
	array('label'=>'Create StudentJersy', 'url'=>array('create')),
	array('label'=>'Manage StudentJersy', 'url'=>array('admin')),
);
?>

<h1>Student Jersies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
