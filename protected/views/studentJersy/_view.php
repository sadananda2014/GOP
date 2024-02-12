<?php
/* @var $this StudentJersyController */
/* @var $data StudentJersy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color_id')); ?>:</b>
	<?php echo CHtml::encode($data->color_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size_id')); ?>:</b>
	<?php echo CHtml::encode($data->size_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jersy_id')); ?>:</b>
	<?php echo CHtml::encode($data->jersy_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_assigned')); ?>:</b>
	<?php echo CHtml::encode($data->date_assigned); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_delivery')); ?>:</b>
	<?php echo CHtml::encode($data->date_delivery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>