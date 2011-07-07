<?php
$this->breadcrumbs=array(
	'Abcs',
);

$this->menu=array(
	array('label'=>'Create Abc', 'url'=>array('create')),
	array('label'=>'Manage Abc', 'url'=>array('admin')),
);
?>

<h1>Abcs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
