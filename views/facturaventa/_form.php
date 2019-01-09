<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\FacturaVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nroFactCom')->textInput() ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'idTipoPago')->textInput() ?>

    <?= $form->field($model, 'idEmpresa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
