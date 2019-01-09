<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEmpresa')->textInput() ?>

    <?= $form->field($model, 'razonSocial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inicioActi')->textInput() ?>

    <?= $form->field($model, 'cetegoriaIva')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
