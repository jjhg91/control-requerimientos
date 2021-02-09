<?php

namespace app\controllers;

use Yii;
use app\models\Requerimiento;
use app\models\RequerimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\TipoRequerimiento;
use app\models\Frecuencia;

use yii\helpers\ArrayHelper;

/**
 * RequerimientoController implements the CRUD actions for Requerimiento model.
 */
class RequerimientoController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Requerimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequerimientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Requerimiento model.
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
     * Creates a new Requerimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Requerimiento();

        $tipoRequerimiento = TipoRequerimiento::find()->all();
        $frecuencia = Frecuencia::find()->all();
        $listaTipoRequerimiento = ArrayHelper::map($tipoRequerimiento, 'id_tipo_requerimiento','descripcion');
        $listaFrecuencia = ArrayHelper::map($frecuencia, 'id_frecuencia','descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
 
            return $this->redirect(['view', 'id' => $model->id_requerimiento]);
        }

        return $this->render('create', [
            'model' => $model,
            'listaTipoRequerimiento' => $listaTipoRequerimiento,
            'listaFrecuencia' => $listaFrecuencia
        ]);
    }

    /**
     * Updates an existing Requerimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $tipoRequerimiento = TipoRequerimiento::find()->all();
        $frecuencia = Frecuencia::find()->all();
        $listaTipoRequerimiento = ArrayHelper::map($tipoRequerimiento, 'id_tipo_requerimiento','descripcion');
        $listaFrecuencia = ArrayHelper::map($frecuencia, 'id_frecuencia','descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_requerimiento]);
        }

        return $this->render('update', [
            'model' => $model,
            'listaTipoRequerimiento' => $listaTipoRequerimiento,
            'listaFrecuencia' => $listaFrecuencia
        ]);
    }


    public function actionEstatus($id)
    {
        $model = $this->findModel($id);

        $tipoRequerimiento = TipoRequerimiento::find()->all();
        $frecuencia = Frecuencia::find()->all();
        $listaTipoRequerimiento = ArrayHelper::map($tipoRequerimiento, 'id_tipo_requerimiento','descripcion');
        $listaFrecuencia = ArrayHelper::map($frecuencia, 'id_frecuencia','descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_requerimiento]);
        }

        return $this->render('estatus', [
            'model' => $model,
            'listaTipoRequerimiento' => $listaTipoRequerimiento,
            'listaFrecuencia' => $listaFrecuencia
        ]);
    }

    public function actionArea($id)
    {
        $model = $this->findModel($id);

        $tipoRequerimiento = TipoRequerimiento::find()->all();
        $frecuencia = Frecuencia::find()->all();
        $listaTipoRequerimiento = ArrayHelper::map($tipoRequerimiento, 'id_tipo_requerimiento','descripcion');
        $listaFrecuencia = ArrayHelper::map($frecuencia, 'id_frecuencia','descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_requerimiento]);
        }

        return $this->render('area', [
            'model' => $model,
            'listaTipoRequerimiento' => $listaTipoRequerimiento,
            'listaFrecuencia' => $listaFrecuencia
        ]);
    }


    public function actionAsignar($id)
    {
        $model = $this->findModel($id);

        $tipoRequerimiento = TipoRequerimiento::find()->all();
        $frecuencia = Frecuencia::find()->all();
        $listaTipoRequerimiento = ArrayHelper::map($tipoRequerimiento, 'id_tipo_requerimiento','descripcion');
        $listaFrecuencia = ArrayHelper::map($frecuencia, 'id_frecuencia','descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_requerimiento]);
        }

        return $this->render('asignar', [
            'model' => $model,
            'listaTipoRequerimiento' => $listaTipoRequerimiento,
            'listaFrecuencia' => $listaFrecuencia
        ]);
    }

    

    /**
     * Deletes an existing Requerimiento model.
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
     * Finds the Requerimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Requerimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requerimiento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
