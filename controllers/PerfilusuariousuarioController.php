<?php

namespace app\controllers;

use Yii;
use app\models\PerfilUsuarioUsuario;
use app\models\PerfilUsuarioUsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\PerfilUsuario;
use yii\helpers\ArrayHelper;

/**
 * PerfilusuariousuarioController implements the CRUD actions for PerfilUsuarioUsuario model.
 */
class PerfilusuariousuarioController extends Controller
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
     * Lists all PerfilUsuarioUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerfilUsuarioUsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilUsuarioUsuario model.
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
     * Creates a new PerfilUsuarioUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PerfilUsuarioUsuario();

        $perfil = PerfilUsuario::find()->all();

$listaPerfiles = ArrayHelper::map($perfil, 'id_perfil_usuario','descripcion');

if ($model->load(Yii::$app->request->post()) ) {
    
    var_dump($model->id_perfil_usuario);
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    $perfiles = $model->id_perfil_usuario;
  
    // var_dump($listaPerfiles);
    // exit;


    foreach ($perfil as $e) {
        $model2 = new PerfilUsuarioUsuario();
        $model2->p00 = $model->p00; 
        $model2->id_perfil_usuario = $e->id_perfil_usuario;
        $model2->estatus_perfil = false;
        
        foreach ($perfiles as $perfil) {
            if( $perfil == $e->id_perfil_usuario ){        
                $model2->estatus_perfil = true;
                
            }
        }

        $model2->save();
        
    }
    return $this->redirect(['index']);

    foreach ($perfiles as $perfil) {
        $model2 = new PerfilUsuarioUsuario();
        $model2->p00 = $model->p00;
        $model2->id_perfil_usuario = (int)$perfil;
        // $model2->save();
    }


    return $this->redirect(['view', 'id' => $model->id_perfil_usuario__usuario]);
    // exit;
    // if ($model->save()) {
    //     return $this->redirect(['view', 'id' => $model->id_perfil_usuario__usuario]);
    // }
}

return $this->render('create', [
    'model' => $model,
    'listaPerfiles' => $listaPerfiles,
]);
    }

    /**
     * Updates an existing PerfilUsuarioUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_perfil_usuario__usuario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PerfilUsuarioUsuario model.
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
     * Finds the PerfilUsuarioUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PerfilUsuarioUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PerfilUsuarioUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
