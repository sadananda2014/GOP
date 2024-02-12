<?php
/* @var $this JersyController */
/* @var $data Jersy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('jersy_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->jersy_id), array('view', 'id'=>$data->jersy_id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />


</div>