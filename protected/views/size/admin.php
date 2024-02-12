<?php
/* @var $this SizeController */
/* @var $model Size */

$this->breadcrumbs=array(
	'Sizes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Size', 'url'=>array('index')),
	array('label'=>'Create Size', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#size-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sizes</h1>
</section>
<section class="content">
<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array('model'=>$model,)); ?>
</div> search-form -->
<div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
     </div><!-- /.box-header -->
    <div class="box-body table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'size-grid',
	'itemsCssClass' => 'table table-bordered table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'size_id',
		'size',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div><!-- /.box-body -->
  </div><!-- /.box -->
    </div>
      </div>