<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facturas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Facturas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_factura',
            'numero_factura',
            'fecha_factura',
            'id_cliente',
            'vendedor',
            //'condicionPago',
            //'condicionIva',
            //'total_venta',
            //'estado_factura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
