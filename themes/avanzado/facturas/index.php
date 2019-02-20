<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="facturas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Facturas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_factura',
            'numero_factura',
            'fecha_factura',
            'id_cliente',
            'vendedor',
            //'condicionPago',
            //'condicionIva',
            //'total_venta',
            //'estado_factura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
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
echo '<b>'.$cadena.'</b>';
echo 'CAE: '.$cae;//'14345678910112';
echo 'Fecha de Vencimiento: '.$fecha;//'20190112';



?>