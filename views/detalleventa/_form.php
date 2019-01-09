<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\DetalleVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDetFac')->textInput() ?>

    <?= $form->field($model, 'nroFactCom')->textInput() ?>

    <?= $form->field($model, 'idProducto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
