<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_id), array('view', 'id'=>$data->payment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_date')); ?>:</b>
	<?php echo CHtml::encode($data->payment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('joined_date')); ?>:</b>
	<?php echo CHtml::encode($data->joined_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_fee')); ?>:</b>
	<?php echo CHtml::encode($data->total_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_now')); ?>:</b>
	<?php echo CHtml::encode($data->pay_now); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('balnce')); ?>:</b>
	<?php echo CHtml::encode($data->balnce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reciept_no')); ?>:</b>
	<?php echo CHtml::encode($data->reciept_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mode_of_payment')); ?>:</b>
	<?php echo CHtml::encode($data->mode_of_payment); ?>
	<br />

	*/ ?>

</div>