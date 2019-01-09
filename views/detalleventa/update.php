<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\DetalleVenta */

$this->title = 'Update Detalle Venta: ' . $model->idDetFac;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetFac, 'url' => ['view', 'id' => $model->idDetFac]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
