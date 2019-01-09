<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Condicion Ivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condicion-iva-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Condicion Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTipoIva',
            'detalle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
