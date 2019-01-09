<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\CondicionIva */

$this->title = 'Create Condicion Iva';
$this->params['breadcrumbs'][] = ['label' => 'Condicion Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condicion-iva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
