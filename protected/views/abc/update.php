<?php
$this->breadcrumbs=array(
	'Abcs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Abc', 'url'=>array('index')),
	array('label'=>'Create Abc', 'url'=>array('create')),
	array('label'=>'View Abc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Abc', 'url'=>array('admin')),
);
?>

<h1>Update Abc <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>