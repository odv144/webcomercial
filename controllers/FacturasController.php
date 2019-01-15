<?php

namespace app\controllers;

use Yii;
use app\models\comercial\Facturas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
//use barcode\barcode\BarcodeGenerator as BarcodeGenerator;
use yii\BarcodeGenerator;
use yii\BarcodeGeneratorPNG;

/**
 * FacturasController implements the CRUD actions for Facturas model.
 */
//include '../vendor/afipsdk/afip.php/src/Afip.php'; 
class FacturasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Facturas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Facturas::find(),
        ]);

        $model = new Facturas;
       
        return $this->render('index', [
            'dataProvider' => $dataProvider,'model'=>$model
        ]);
    }
    public function actionPdf()
    {
        # code...
  
        //usando la libreria de mpdf mas info http://demos.krajee.com/mpdf#installation
        //picqer para el barcode mas info https://github.com/picqer/php-barcode-generator

        $dataProvider = new ActiveDataProvider([
            'query' => Facturas::find(),
        ]);
        $model = new Facturas;
        return $this->render('modelofac',['dataProvider' => $dataProvider,'model'=>$model
                    ]);
        
        $content= $this->renderPartial('pdf', [
            'dataProvider' => $dataProvider,'model'=>$model,
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,//BROWSER--DOWNLOAD
            'filename'=>'facturaA.pdf',
            'content' => $content,//$this->renderPartial('pdf'),
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'Facturacion Electronica desarrollada por OdvSystem',
                'SetSubject' => 'Generacion de factura para la empresa: Compushop',
                'SetHeader' => ['Buscando darle Forma||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'Virili Omar Dario',
                'SetCreator' => 'Virili Omar Dario',
                'SetKeywords' => 'facturacion,electronica,web,y otras',
            ]
        ]);
        return $pdf->render();
    
    }
    /**
     * Displays a single Facturas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Facturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Facturas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_factura]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Facturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_factura]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Facturas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Facturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Facturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Facturas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCodigobar()
    {
     
        $pdf = new FPDF();
        //$pdf=new PDF_i25();
        $pdf->AddPage();
        $x = 60;
        $y = 30;
        //$pdf->i25($xpos, $ypos, $barcode, $baseline, $height);
        $pdf->Image('http://localhost/barcode?code='.$barcode,$x,$y,NULL,NULL,'PNG');
        $pdf->Output();
    //$barcode = cuit 11 posiciones + tipo de comprobante 2 posiciones + punto de venta 4 posiciones + CAE 14 posiciones + fecha vencimiento cae 8 posiciones;
    }
}

