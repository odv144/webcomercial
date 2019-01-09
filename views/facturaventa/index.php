<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factura Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-venta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Factura Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nroFactCom',
            'idCliente',
            'fecha',
            'idTipoPago',
            //'idEmpresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
