<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\CondicionIva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condicion-iva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoIva')->textInput() ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
