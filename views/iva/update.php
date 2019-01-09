<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\CondicionIva */

$this->title = 'Update Condicion Iva: ' . $model->idTipoIva;
$this->params['breadcrumbs'][] = ['label' => 'Condicion Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoIva, 'url' => ['view', 'id' => $model->idTipoIva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="condicion-iva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
