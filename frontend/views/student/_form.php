<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">




    <?php $form = ActiveForm::begin(); ?>
        
    选择班级:
    <select name="Student[c_id]">
            <option>选择班级</option>
        <?php foreach($room as $v) {?> 
            <option value="<?= $v['id']?>"><?= $v['name']; ?></option>
        <?php } ?>
    </select>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!-- 
    <?= $form->field($model,'sex')->radioList(['男','女'])?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
 -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
