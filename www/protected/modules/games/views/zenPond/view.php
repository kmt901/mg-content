<?php
$this->breadcrumbs = array(
  Yii::t('app', 'Admin')=>array('/admin'),
  Yii::t('app', 'Games') => array('/games'),
  $model->name,
);

$this->menu = array(
  array('label'=>Yii::t('app', 'Manage') . ' ' . Yii::t('app', 'Games'), 'url'=>array('/games')),
  array('label' => Yii::t('app', 'Update') . ' ' . $model->name, 'url'=>array('update')),
);

?>
<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->name); ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'cssFile' => Yii::app()->request->baseUrl . "/css/yii/detailview/styles.css",
  'attributes' => array(
	array(
      'name' => 'active',
      'value' => MGHelper::itemAlias('active', $model->active),
    ),
    'number_played',
    'name',
    'description',
    'arcade_image',
    'turns',
    'image_width',
    'image_height',
    'partner_wait_threshold',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('imageSets')); ?></h2>
<?php
  echo GxHtml::openTag('ul');
  
  if (count($model->imageSets) == 0) {
    echo "<li>no item(s) assigned</li>";
  }
  
  foreach($model->imageSets as $relatedModel) {
    echo GxHtml::openTag('li');
    echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('/admin/imageSet/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
    echo GxHtml::closeTag('li');
  }
  echo GxHtml::closeTag('ul');
?>

