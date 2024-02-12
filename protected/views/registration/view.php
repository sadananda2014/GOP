<?php
 Yii::app()->clientScript->registerCoreScript('jquery');  
$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Registration', 'url'=>array('index')),
	array('label'=>'Create Registration', 'url'=>array('create')),
	array('label'=>'Update Registration', 'url'=>array('update', 'id'=>$model->register_id)),
	array('label'=>'Delete Registration', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->register_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registration', 'url'=>array('admin')),
);
?>

<h1>View Registration #<?php echo $model->register_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	array( 
			'name'=>'image',
			'type'=>'raw',
			'value'=> CHtml::image(Yii::app()->getBaseUrl(true).'/img/profile/'.$model->image),
			),
		'register_id',
		'enquiry_id',
		'name',
		'dob',
		'gender',
		'age',
		'class',
		'weight',
		'height',
		'blood_group',
		'uniform_size',
		'past_training_experience',
		'represented_team',
		'school',
		'medical_conditions',
		//'image',
		
		'full_address',
		'pincode',
		'trainee_phone',
		'trainee_email',
		'residence_phone',
		'primary_contact_person',
		'emergency_contact',
		'fathers_name',
		'fathers_phone',
		'fathers_email',
		'mothers_name',
		'mothers_phone',
		'mothers_email',
	),
)); ?>
