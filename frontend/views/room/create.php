<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */

$this->title = 'Create Room';
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= Html::beginForm(['room/create']);?>

班级名称：<?= Html::input('text','room[name]'); ?><br/><br/><br/>


　<?= Html::submitButton('点击提交');?>


<? Html::endForm() ?>







