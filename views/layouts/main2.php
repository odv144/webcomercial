<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use yii\debug\Toolbar;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo Html::encode($this->title); ?></title>
<meta property='og:site_name' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:title' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:description' content='<?php echo Html::encode($this->title); ?>' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel='stylesheet' type='text/css' href='<?php echo $this->theme->baseUrl; ?>/files/main_style.css' title='wsite-theme-css' />
<?php $this->head(); ?>
</head>
<body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>
  <?php $this->beginBody(); ?>

<div id="header-outer-wrap">
  <div class="wrapper">
    <table id="header">
      <tr>
        <td id="logo"><span class='wsite-logo'><a href='/'><span id="wsite-title"><?php echo Html::encode(\Yii::$app->name); ?></span></a></span></td>
        <td id="header-right">
          <table>
            <tr>
              <td class="phone-number"></td>
              <td class="social"></td>
              <td class="search"></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <div id="navigation">

<?php echo Menu::widget(array(
        'options' => array('class' => 'nav'),
        'items' => array(
          array('label' => 'Home', 'url' => array('/site/index')),
          array('label' => 'About', 'url' => array('/site/about')),
          array('label' => 'Contact', 'url' => array('/site/contact')),
          Yii::$app->user->isGuest ?
            array('label' => 'Login', 'url' => array('/site/login')) :
            array('label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => array('/site/logout')),
        ),
      )); ?>
    </div>
  </div>
</div>

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
<hr>

<div id="main-wrapper">
  <div class="wrapper">
    <div id="content">
      <div id="banner-container">
        <div id="banner">
          <div class="wsite-header"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div id="text">
        <div id='wsite-content' class='wsite-not-footer'>
          <?php echo $content; ?>
</div>

      </div>
    </div>
    <div id="footer"><?php echo Html::encode(\Yii::$app->name); ?>

</div>
    <div class="clear"></div>
  </div>
</div>
<hr>

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
