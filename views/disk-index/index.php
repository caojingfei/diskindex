<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiskIndexSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disk Indices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disk-index-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Disk Index', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'diskid',
            'dirname',
            'filename',
            'extension',
            //'filesize',
            //'filectime:datetime',
            //'filemtime:datetime',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
