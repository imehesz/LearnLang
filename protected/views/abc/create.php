<?php
$this->breadcrumbs=array(
	'Abcs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Abc', 'url'=>array('index')),
	array('label'=>'Manage Abc', 'url'=>array('admin')),
);
?>

<h1>Create Abc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>