<?php
$this->breadcrumbs=array(
  'Enquiries'=>array('index'),
  $model->enquiry_id,
);

$this->menu=array(
  array('label'=>'List Enquiry', 'url'=>array('index')),
  array('label'=>'Create Enquiry', 'url'=>array('create')),
  array('label'=>'Update Enquiry', 'url'=>array('update', 'id'=>$model->enquiry_id)),
  array('label'=>'Delete Enquiry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->enquiry_id),'confirm'=>'Are you sure you want to delete this item?')),
  array('label'=>'Manage Enquiry', 'url'=>array('admin')),
);
?>

<h1>View Enquiry #<?php echo $model->enquiry_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
  'data'=>$model,
  'attributes'=>array(
    'enquiry_id',
    'enquiry_name',
    'enquiry_location',
    'enquiry_date',
    'enquiry_type',
    'how_did_they_know_about_us',
    'trainee_name',
    'trainee_age',
    'trainee_school',
    'status',
    'relation_between_enquirer_joinee',
    'phone',
    'email',
    'preferred_center',
    'preferred_batch',
    'additional_comments',
    'follow_up',
    'follow_up_comment',
      ),
)); ?>
