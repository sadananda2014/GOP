<?php
/* @var $this SizeController */
/* @var $data Size */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('size_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->size_id), array('view', 'id'=>$data->size_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />


</div>