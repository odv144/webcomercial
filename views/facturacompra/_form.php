<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\FacturaCompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nroFactCom')->textInput() ?>

    <?= $form->field($model, 'idProveedor')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'recibido')->checkbox() ?>

    <?= $form->field($model, 'idDetCom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
