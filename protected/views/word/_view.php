<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alphabet_id')); ?>:</b>
	<?php echo CHtml::encode($data->alphabet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('word')); ?>:</b>
	<?php echo CHtml::encode($data->word); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('in_english')); ?>:</b>
	<?php echo CHtml::encode($data->in_english); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ext_link')); ?>:</b>
	<?php echo CHtml::encode($data->ext_link); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('meaning')); ?>:</b>
	<?php echo CHtml::encode($data->meaning); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_yn')); ?>:</b>
	<?php echo CHtml::encode($data->active_yn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>