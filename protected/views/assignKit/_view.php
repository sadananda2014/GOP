<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_students_id')); ?>:</b>
	<?php echo CHtml::encode($data->batch_students_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kit_item_id')); ?>:</b>
	<?php echo CHtml::encode($data->kit_item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand')); ?>:</b>
	<?php echo CHtml::encode($data->brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />


</div>