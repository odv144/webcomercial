<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\Productos */

$this->title = 'Update Productos: ' . $model->idProducto;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProducto, 'url' => ['view', 'id' => $model->idProducto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
