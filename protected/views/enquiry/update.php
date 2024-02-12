<?php
$this->breadcrumbs=array(
	'Enquiries'=>array('index'),
	$model->enquiry_id=>array('view','id'=>$model->enquiry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Enquiry', 'url'=>array('index')),
	array('label'=>'Create Enquiry', 'url'=>array('create')),
	array('label'=>'View Enquiry', 'url'=>array('view', 'id'=>$model->enquiry_id)),
	array('label'=>'Manage Enquiry', 'url'=>array('admin')),
);
?>

<h1>Update Enquiry <?php echo $model->enquiry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>