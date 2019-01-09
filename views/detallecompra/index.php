<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-compra-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detalle Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetFac',
            'nroFactCom',
            'idProducto',
            'costo',
            'iva',
            //'cantidad',
            //'lote',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
