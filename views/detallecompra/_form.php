<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\DetalleCompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDetFac')->textInput() ?>

    <?= $form->field($model, 'nroFactCom')->textInput() ?>

    <?= $form->field($model, 'idProducto')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'lote')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
