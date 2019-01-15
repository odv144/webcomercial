<?php
use yii\helpers\Html;
use yii\BarcodeGenerator;
use yii\BarcodeGeneratorPNG;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;

?>
<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, consequatur inventore. Quam vel consectetur voluptates doloremque corporis iure sapiente dolor, fuga quaerat sequi? Voluptates doloribus facilis nulla ea magnam consequuntur.</p>
<div class="row">
    <div class="col-xs-4 col-sm-9 bg-warning">Don't float on all viewport sizes</div>
    <div class="col-xs-6 col-sm-3 bg-info">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos necessitatibus vero earum deserunt mollitia magni nobis tempore quam modi sequi! Quidem tenetur porro quasi rem nemo aspernatur, modi dolor praesentium!
    </div>
    <div class="row">
  <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
  <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>

  <!-- Add the extra clearfix for only the required viewport -->
  <div class="clearfix visible-xs-block"></div>

  <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
  <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
</div>
</div>
<div class="bg-success clearfix w-100 ">
    <div class="bg-danger float-left w-20">
        <p>datos de empresa Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptate, nihil culpa accusamus. Ab adipisci, sint magni asperiores deserunt et dicta, facilis, aut rem itaque laborum placeat atque? Dolorem, impedit!</p>
    </div>

    <div class="bg-info d-inline w-50 ">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere rerum hic numquam magnam aspernatur possimus at ipsa nobis quos pariatur maiores velit, quia quod qui, natus soluta eligendi voluptatibus distinctio?atos sobre facturacion</p>
    </div>
  
   


<?php 

$data = $model->fact_a();
//echo $data['DocNro'].'</br>';//para acceder a los datos 
//echo '<pre>'.print_r($data).'</pre>';
/****************************************/
$afip = new Afip(array('CUIT' => 23307295059));

$voucher_info = $afip->ElectronicBilling->GetVoucherInfo(7,1,6); //Devuelve la información del comprobante 1 para el punto de venta 1 y el tipo de comprobante 6 (Factura B)
//$otra="El ultimo comprobante es: ".$afip->ElectronicBilling->GetLastVoucher(1,6);//me permite obtener el ultimo numero de comprbante para el punto de venta y tiepo de comprobante.

$cae;
$fecha;

if($voucher_info === NULL){
    echo 'El comprobante no existe';
    $res = $afip->ElectronicBilling->CreateNextVoucher($data);
    $otra = json_encode($afip->ElectronicBilling->CreateNextVoucher($data));

    $cae= $res['CAE']; //CAE asignado el comprobante
    $fecha=$res['CAEFchVto']; //Fecha de vencimiento del CAE (yyyy-mm-dd)
    //$res['voucher_number']; //Número asignado al comprobante
}else{
    echo 'Esta es la información del comprobante: Generico pero estoy en la seccion de Factura A';
    $cae = $voucher_info->CodAutorizacion; 
    $fecha = $voucher_info->FchVto;
}



$cuit=$data['DocNro'];//'23307295059';
$pv='00001'; //tomar el punta ode venta de data $data[PtoVta] y ver como agregar los digitos para que tenga siempre 5
$tipocomprobante='006';//tomar el punta ode venta de data $data[CbteTipo] y ver como agregar los digitos para que tenga siempre 3
$cadena= $model->codigovirificador($cuit,$tipocomprobante, $pv,$cae,$fecha);
$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
 echo '<div width="50%" border="1"><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($cadena, $generator::TYPE_INTERLEAVED_2_5)) . '">';
?>
<p><?= $cadena?></p>
<p><?= '</br>CAE: '.$cae?></p>
<p><?= 'Fecha Vencimiento: '.$fecha ?></p>
</div>
</div>
