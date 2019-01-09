<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\FacturaCompra */

$this->title = 'Create Factura Compra';
$this->params['breadcrumbs'][] = ['label' => 'Factura Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-compra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
