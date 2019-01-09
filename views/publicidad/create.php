<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\comercial\Publicidad */

$this->title = 'Create Publicidad';
$this->params['breadcrumbs'][] = ['label' => 'Publicidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
