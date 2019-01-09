<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\Publicidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagen')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'medida')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
