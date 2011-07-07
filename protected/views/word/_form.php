<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'word-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'alphabet_id'); ?>
		<?php echo $form->dropDownList($model,'alphabet_id', CHtml::listData( Abc::model()->findAll(), 'id', 'letter' )); ?>
		<?php echo $form->error($model,'alphabet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'word'); ?>
		<?php echo $form->textField($model,'word',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'word'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'in_english'); ?>
		<?php echo $form->textField($model,'in_english',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'in_english'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video'); ?>
		<?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->textField($model,'picture',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ext_link'); ?>
		<?php echo $form->textField($model,'ext_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ext_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meaning'); ?>
		<?php echo $form->textArea($model,'meaning',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meaning'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active_yn'); ?>
		<?php echo $form->dropDownList( $model,'active_yn', array( 'no', 'yes' ) ); ?>
		<?php echo $form->error($model,'active_yn'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
