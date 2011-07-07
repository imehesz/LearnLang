<?php
$this->breadcrumbs=array(
	'Abcs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Abc', 'url'=>array('index')),
	array('label'=>'Create Abc', 'url'=>array('create')),
	array('label'=>'Update Abc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Abc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Abc', 'url'=>array('admin')),
);
?>

<h1>View Abc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lang_id',
		'letter',
		'order',
	),
)); ?>
