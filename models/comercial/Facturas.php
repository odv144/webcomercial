<?php

namespace app\models\comercial;

use Yii;

/**
 * This is the model class for table "facturas".
 *
 * @property int $id_factura
 * @property int $numero_factura
 * @property string $fecha_factura
 * @property int $id_cliente
 * @property string $vendedor
 * @property string $condicionPago
 * @property string $condicionIva
 * @property string $total_venta
 * @property int $estado_factura
 */
 class Facturas extends \yii\db\ActiveRecord
 {
   
    /********************************************************************/
    public $id;
    public $CantReg=2; // Cantidad de comprobantes a registrar
    public $PtoVta= 1; // Punto de venta
    public $CbteTipo= 6; // Tipo de comprobante (ver tipos disponibles) 
    public $Concepto= 1; // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
    public $DocTipo= 80; // Tipo de documento del comprador (ver tipos disponibles)
    public $DocNro= "20111111112"; // Numero de documento del comprador
    public $CbteDesde= 1; // Numero de comprobante o numero del primer comprobante en caso de ser mas de uno
    public $CbteHasta= 1; // Numero de comprobante o numero del ultimo comprobante en caso de ser mas de uno
    public $CbteFch;//intval(date('Ymd')); // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
    public $ImpTotal= 121; // Importe total del comprobante
    public $ImpTotConc=0; // Importe neto no gravado
    public $ImpNeto= 100; // Importe neto gravado
    public $ImpOpEx = 0; // Importe exento de IVA
    public $ImpIVA= 21; //Importe total de IVA
    public $ImpTrib = 0; //Importe total de tributos
    public $FchServDesde= NULL; // (Opcional) Fecha de inicio del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
    public $FchServHasta= NULL; // (Opcional) Fecha de fin del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
    public $FchVtoPago= NULL; // (Opcional) Fecha de vencimiento del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
    public $MonId= 'PES'; //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos) 
    public $MonCotiz= 1; // Cotización de la moneda usada (1 para pesos argentinos)  
    
    public $CbtesAsoc = array( // (Opcional) Comprobantes asociados
        array(
            'Tipo'      => 991, // Tipo de comprobante (ver tipos disponibles) 
            'PtoVta'    => 1, // Punto de venta
            'Nro'       => 1, // Numero de comprobante
            'Cuit'      => 23307295059 // (Opcional) Cuit del emisor del comprobante
            )
        );
    
    public $Tributos= array( // (Opcional) Tributos asociados al comprobante
                array(
                    'Id'        =>  99, // Id del tipo de tributo (ver tipos disponibles) 
                    'Desc'      => 'Ingresos Brutos', // (Opcional) Descripcion
                    'BaseImp'   => 100, // Base imponible para el tributo
                    'Alic'      => 0, // Alícuota
                    'Importe'   => 0 // Importe del tributo
                )
            );
    
    public $Iva = array( // (Opcional) Alícuotas asociadas al comprobante
        array(
            'Id'        => 5, // Id del tipo de IVA (ver tipos disponibles) 
            'BaseImp'   => 100, // Base imponible
            'Importe'   => 21 // Importe 
        )
    );
    
    public $Opcionales  = array( // (Opcional) Campos auxiliares
                array(
                    'Id'        => 17, // Codigo de tipo de opcion (ver tipos disponibles) 
                    'Valor'     => 2 // Valor 
                )
            ); 
    public $Compradores = array( // (Opcional) Detalles de los clientes del comprobante 
                array(
                    'DocTipo'       => 80, // Tipo de documento (ver tipos disponibles) 
                    'DocNro'        => 23307295059, // Numero de documento
                    'Porcentaje'    => 100 // Porcentaje de titularidad del comprador
                )
            );
    
    /***********************************************/
    public function rules()
    {
        return[
            [['id','dni', 'razon_social', 'responsable', 'direccion', 'actividad', 'telefono', 'email', 'sitio_web', 'fecha_asociado'], 'required'],
            
            ['dni','match','pattern'=>'/^[0-9\s]+$/i','message'=>'Solo se permiten numeros'],
            ['dni','match','pattern'=>'/^.{6,8}$/','message'=>'Minimo de caracteres 6 y maximo 8'],

            
            ['razon_social','match','pattern'=>'/^[0-9a-záéíóúñ\s]+$/i','message'=>'Solo se permiten letras'],
            ['razon_social','match','pattern'=>'/^.{5,30}$/','message'=>'Minimo de caracteres 5 y maximo 30'],

            ['responsable','match','pattern'=>'/^[a-záéíóúñ\s]+$/i','message'=>'Solo se permiten letras'],
            ['responsable','match','pattern'=>'/^.{3,30}$/','message'=>'Minimo de caracteres 3 y maximo 30'],

            ['direccion','match','pattern'=>'/^[0-9a-záéíóúñ\s]+$/i','message'=>'Solo se permiten letras'],
            ['direccion','match','pattern'=>'/^.{3,30}$/','message'=>'Minimo de caracteres 3 y maximo 30'],
            
            ['actividad','match','pattern'=>'/^[a-záéíóúñ\s]+$/i','message'=>'Solo se permiten letras'],
            ['actividad','match','pattern'=>'/^.{3,30}$/','message'=>'Minimo de caracteres 3 y maximo 30'],

            ['telefono','match','pattern'=>'/^[0-9-()\s]+$/i','message'=>'Solo se permiten numeros "(",")","-"'],
            ['telefono','match','pattern'=>'/^.{6,15}$/','message'=>'Minimo de caracteres 6 y maximo 15'],

            ['email','match','pattern'=>'/^[0-9a-z@_-.\s]+$/i','message'=>'Letras numeros y @ - _ '],
            ['email','match','pattern'=>'/^.{3,45}$/','message'=>'Minimo de caracteres 3 y maximo 45'],

            
            ['sitio_web','match','pattern'=>'/^.{3,50}$/','message'=>'Minimo de caracteres 3 y maximo 50'],


            ['fecha_asociado','match','pattern'=>'/^[0-9-\s]+$/i','message'=>'Solo se permiten numero y como separador "-"'],
            ['fecha_asociado','match','pattern'=>'/^.{10,10}$/','message'=>'Fecha en formato 12-25-2018'],

            [['numero_factura', 'fecha_factura', 'id_cliente', 'vendedor', 'condicionPago', 'condicionIva', 'total_venta', 'estado_factura'], 'required'],
            [['numero_factura', 'id_cliente', 'estado_factura'], 'integer'],
            [['fecha_factura', 'condicionPago'], 'string', 'max' => 30],
            [['vendedor', 'condicionIva'], 'string', 'max' => 255],
            [['total_venta'], 'string', 'max' => 20],
            [['numero_factura'], 'unique'],
        ];
    }

    /*****************************************************/
    public function fact_a()
    {
        $this->CbteFch  =intval(date('Ymd'));
        $datos = array(
            'CantReg'       => $this->CantReg, // Cantidad de comprobantes a registrar
            'PtoVta'        => $this->PtoVta, // Punto de venta
            'CbteTipo'      => $this->CbteTipo, // Tipo de comprobante (ver tipos disponibles) 
            'Concepto'      => $this->Concepto, // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
            'DocTipo'       => $this->DocTipo, // Tipo de documento del comprador (ver tipos disponibles)
            'DocNro'        => $this->DocNro, // Numero de documento del comprador
            'CbteDesde'     => $this->CbteDesde, // Numero de comprobante o numero del primer comprobante en caso de ser mas de uno
            'CbteHasta'     => $this->CbteHasta, // Numero de comprobante o numero del ultimo comprobante en caso de ser mas de uno
            'CbteFch'       => $this->CbteFch, // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
            'ImpTotal'      => $this->ImpTotal, // Importe total del comprobante
            'ImpTotConc'    => $this->ImpTotConc, // Importe neto no gravado
            'ImpNeto'       => $this->ImpNeto, // Importe neto gravado
            'ImpOpEx'       => $this->ImpOpEx, // Importe exento de IVA
            'ImpIVA'        => $this->ImpIVA, //Importe total de IVA
            'ImpTrib'       => $this->ImpTrib, //Importe total de tributos
            'FchServDesde'  => $this->FchServDesde, // (Opcional) Fecha de inicio del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchServHasta'  => $this->FchServHasta, // (Opcional) Fecha de fin del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchVtoPago'    => $this->FchVtoPago, // (Opcional) Fecha de vencimiento del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'MonId'         => $this->MonId, //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos) 
            'MonCotiz'      => $this->MonCotiz, // Cotización de la moneda usada (1 para pesos argentinos)  
            'CbtesAsoc'     => $this->CbtesAsoc,
            /*
            'Tributos'      => $this->Tributos,
            */
            'Iva'           => $this->Iva,
            /*
            'Opcionales'    => $this->Opcionales,

            'Compradores'   => $this->Compradores,
            */
            
        );

        return $datos;
    }
    /*****************************************************/
    /*****************************************************/
    public function fact_c()
    {
        $this->CbteFch  =intval(date('Ymd'));
        $datos = array(
            'CantReg'       => $this->CantReg, // Cantidad de comprobantes a registrar
            'PtoVta'        => $this->PtoVta, // Punto de venta
            'CbteTipo'      => $this->CbteTipo, // Tipo de comprobante (ver tipos disponibles) 
            'Concepto'      => $this->Concepto, // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
            'DocTipo'       => $this->DocTipo, // Tipo de documento del comprador (ver tipos disponibles)
            'DocNro'        => $this->DocNro, // Numero de documento del comprador
            'CbteDesde'     => $this->CbteDesde, // Numero de comprobante o numero del primer comprobante en caso de ser mas de uno
            'CbteHasta'     => $this->CbteHasta, // Numero de comprobante o numero del ultimo comprobante en caso de ser mas de uno
            'CbteFch'       => $this->CbteFch, // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
            'ImpTotal'      => $this->ImpTotal, // Importe total del comprobante
            'ImpTotConc'    => $this->ImpTotConc, // Importe neto no gravado
            'ImpNeto'       => $this->ImpNeto, // Importe neto gravado
            'ImpOpEx'       => $this->ImpOpEx, // Importe exento de IVA
            'ImpIVA'        => $this->ImpIVA, //Importe total de IVA
            'ImpTrib'       => $this->ImpTrib, //Importe total de tributos
            'FchServDesde'  => $this->FchServDesde, // (Opcional) Fecha de inicio del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchServHasta'  => $this->FchServHasta, // (Opcional) Fecha de fin del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchVtoPago'    => $this->FchVtoPago, // (Opcional) Fecha de vencimiento del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'MonId'         => $this->MonId, //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos) 
            'MonCotiz'      => $this->MonCotiz, // Cotización de la moneda usada (1 para pesos argentinos)  
            'CbtesAsoc'     => $this->CbtesAsoc,
            /*
            'Tributos'      => $this->Tributos,
            */
            'Iva'           => $this->Iva,
            /*
            'Opcionales'    => $this->Opcionales,

            'Compradores'   => $this->Compradores,
            */
            
        );
     return $datos;
    }

    //'Revisar que estoy intentando hacer la validacion tambine en ajax y no esta andando'


    /********************************************************************/

    public static function tableName()
    {
        return 'facturas';
    }

    
    public function attributeLabels()
    {
        return [
            'id_factura' => 'Id Factura',
            'numero_factura' => 'Numero Factura',
            'fecha_factura' => 'Fecha Factura',
            'id_cliente' => 'Id Cliente',
            'vendedor' => 'Vendedor',
            'condicionPago' => 'Condicion Pago',
            'condicionIva' => 'Condicion Iva',
            'total_venta' => 'Total Venta',
            'estado_factura' => 'Estado Factura',
        ];
    }
     public function codigovirificador($cuit,$tipocomprobante, $pv,$cae,$fecha)
    {
        $codigo=$cuit.$tipocomprobante.$pv.$cae.$fecha;//codigo armado a prueba y seguiendo las normas estrablecidas
        $digito_ini = str_split($codigo);
     
        $total=0;

        foreach ($digito_ini as $key=>$value) {
            if(($key %2)==0)
            {
                
                $digito_ini[$key]=$value*3;
            }
            $total+=$digito_ini[$key];
            
        }

        $dv=10-($total % 10);       //obtine el digito virificador una ves restado a la decena mas cercana
        $codigo.=$dv;
       
    return $codigo;
    }

} 
?>
