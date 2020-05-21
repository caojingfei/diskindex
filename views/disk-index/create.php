<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiskIndex */

$this->title = 'Create Disk Index';
$this->params['breadcrumbs'][] = ['label' => 'Disk Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disk-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
