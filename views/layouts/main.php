<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],

            
            ['label' =>'Ventas', 
                'items'=>[
                    ['label'=>'Factura A','url'=>['/desarrollo/facturaa']],
                    ['label'=>'Factura B','url'=>['/desarrollo/facturab']],
                    ['label'=>'Recibo A','url'=>['/desarrollo/reciboa']],
                    ],
            ],
            ['label' =>'Clientes', 
                'items'=>[
                    ['label'=>'Indice','url'=>['/clientes/index']],
                    ['label'=>'Nuevo','url'=>['/clientes/create']],
                    ],
            ],
             ['label' =>'Productos',
                'items'=>[
                    ['label'=>'Nuevo','url'=>['/productos/nuevo']],
                    ],
            ],

            ['label' =>'Facturacion',
                'items'=>[
                    ['label'=>'Facturas','url'=>['/facturas/index']],
                    ['label'=>'Facturas de Compras','url'=>['/facturacompra/index']],
                    ['label'=>'Facturas de Ventas','url'=>['/facturaventa/index']],
                    ],
            ],

            ['label' =>'General', 
                'items'=>[
                    ['label'=>'Condicion de Iva','url'=>['/iva/index']],
                    ['label'=>'Publicidad','url'=>['/desarrollo/facturab']],
                    ['label'=>'Empresa','url'=>['/controlador/empresa']],
                    ],
            ],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
