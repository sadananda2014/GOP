<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->batch_id), array('view', 'id'=>$data->batch_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_name')); ?>:</b>
	<?php echo CHtml::encode($data->batch_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_location')); ?>:</b>
	<?php echo CHtml::encode($data->batch_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_timing')); ?>:</b>
	<?php echo CHtml::encode($data->batch_timing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coach_id')); ?>:</b>
	<?php echo CHtml::encode($data->coach_id); ?>
	<br />


</div>