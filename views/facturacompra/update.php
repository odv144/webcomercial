<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\FacturaCompra */

$this->title = 'Update Factura Compra: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Factura Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factura-compra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
