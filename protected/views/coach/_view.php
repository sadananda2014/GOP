<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('coach_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->coach_id), array('view', 'id'=>$data->coach_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coach_name')); ?>:</b>
	<?php echo CHtml::encode($data->coach_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>