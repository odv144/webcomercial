<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;

use app\assets\EleAsset;

$asset= @app\assets\EleAsset::register($this);
$baseUrl=$asset->baseUrl;

// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo Html::encode($this->title); ?>Mi aplicacionpor defecto</title>
<meta property='og:site_name' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:title' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:description' content='<?php echo Html::encode($this->title); ?>' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


<?php $this->head(); ?>
</head>
<body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>
  <?php $this->beginBody(); ?>
<div class="container" id="navigation">
    <?php
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'wrap',
        ],
    ]);
    ?>
  
<div >
    <?php
 
    echo Nav::widget([
        'options' => ['class' => 'nav'],
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

</div>
<div id="header-outer-wrap">
  <div class="wrapper" >
      <table id="header">
      <tr>
        <td id="logo"><span class='wsite-logo'><a href='/'><span id="wsite-title"><?php echo 'Esta es mi aplicacion'//Html::encode(\Yii::$app->name); ?></span></a></span></td>
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
</div>   
</div>
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

      <div id="footer"><?php echo Html::encode(\Yii::$app->name); ?> </div>
    <div class="clear"></div>
  </div>
</div>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>