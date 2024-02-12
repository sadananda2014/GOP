<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Inventory', 'url'=>array('index')),
	array('label'=>'Create Inventory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inventory-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Inventories</h1>
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
	'id'=>'inventory-grid',
	'itemsCssClass' => 'table table-bordered table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'inventory_id',
		array(
                      'name'=>'item_id',
                      'value'=>'$data->item->item_name',
                      ),
		array(
                      'name'=>'brand_id',
                      'value'=>'$data->brand->brand_name',
                      ),
		array(
                      'name'=>'color_id',
                      'value'=>'$data->color->color_name',
                      ),
		array(
                      'name'=>'size_id',
                      'value'=>'$data->size->size',
                      ),
		'quantity',
		'available_qty',
		array(
			'class'=>'CButtonColumn',
		'template'=>'{view}',
		),
	),
)); ?>
</div><!-- /.box-body -->
  </div><!-- /.box -->
    </div>
      </div>