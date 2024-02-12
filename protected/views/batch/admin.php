<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Batch', 'url'=>array('index')),
	array('label'=>'Create Batch', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('batch-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Batches</h1>
</section>
<section class="content">
<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
</div>search-form -->
<div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
     </div><!-- /.box-header -->
    <div class="box-body table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'batch-grid',
	'itemsCssClass' => 'table table-bordered table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'batch_id',
		'batch_name',
		'batch_location',
		'batch_timing',
		//'coach_id',
		array(			
					  'header'=>'Coach Name',		
                      'name'=>'coach_id',
                      //'value'=>'$data->operator->operator_name',
					  'value'=>'Coach::model()->findByPk((int)$data->coach_id)->coach_name',
                      ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div><!-- /.box-body -->
  </div><!-- /.box -->
    </div>
      </div>