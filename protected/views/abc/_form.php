<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'abc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lang_id'); ?>
		<?php echo $form->dropDownList($model,'lang_id', CHtml::listData( Language::model()->findAll(), 'id', 'name' )); ?>
		<?php echo $form->error($model,'lang_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'letter'); ?>
		<?php //echo $form->textField($model,'letter',array('size'=>5,'maxlength'=>5)); ?>
        <?php echo $form->textarea( $model, 'letter' ); ?>
		<?php echo $form->error($model,'letter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order', array( 'size' => 3 ) ); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
