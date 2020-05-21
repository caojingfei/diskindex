<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiskIndex */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disk-index-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diskid')->textInput() ?>

    <?= $form->field($model, 'dirname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extension')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filesize')->textInput() ?>

    <?= $form->field($model, 'filectime')->textInput() ?>

    <?= $form->field($model, 'filemtime')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
