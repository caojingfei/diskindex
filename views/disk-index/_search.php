<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiskIndexSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disk-index-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'diskid') ?>

    <?= $form->field($model, 'dirname') ?>

    <?= $form->field($model, 'filename') ?>

    <?= $form->field($model, 'extension') ?>

    <?php // echo $form->field($model, 'filesize') ?>

    <?php // echo $form->field($model, 'filectime') ?>

    <?php // echo $form->field($model, 'filemtime') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
