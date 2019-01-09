<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\Facturas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facturas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero_factura')->textInput() ?>

    <?= $form->field($model, 'fecha_factura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'vendedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condicionPago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condicionIva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_venta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_factura')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
