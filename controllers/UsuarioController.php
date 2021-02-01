<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use app\models\Cargo;
use app\models\Departamento;
use app\models\EstatusUsuario;
use app\models\PerfilUsuarioUsuario;
use app\models\PerfilUsuario;


use app\controllers\AccessController;


/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        // $access = new AccessController();
        // $access->accessT();
        
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {  
        $model = $this->findModel($id);
        $cargo = $model->cargo->descripcion;
        $departamento = $model->departamento->descripcion;
        $estatus = $model->estatusUsuario->descripcion;

        $listaPerfiles = PerfilUsuarioUsuario::findAll(['p00'=>$id, 'estatus_perfil' => true]);
        $perfiles = '|    ';

        foreach ($listaPerfiles as $pp) {
            $perfiles = $perfiles . $pp->perfilUsuario->descripcion . '    |    ';
        }
        return $this->render('view', [
            // 'model' => $this->findModel($id),
            'model' => $model,
            'cargo' => $cargo,
            'departamento' => $departamento,
            'estatus' => $estatus,
            'perfiles' => $perfiles,
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        $cargo = Cargo::find()->all();
        $departamento = Departamento::find()->all();
        $estatusUsuario = EstatusUsuario::find()->all();
        $listaCargo = ArrayHelper::map($cargo, 'id_cargo','descripcion');
        $listaDepartamento = ArrayHelper::map($departamento, 'id_departamento','descripcion');
        $listaEstatusUsuario = ArrayHelper::map($estatusUsuario, 'id_estatus_usuario','descripcion');

        // PERFILES
        $modelPerfiles = new PerfilUsuarioUsuario();
        $perfil = PerfilUsuario::find()->all();
        $listaPerfiles = ArrayHelper::map($perfil, 'id_perfil_usuario','descripcion');
        // PERFILES

        if ($model->load(Yii::$app->request->post()) && $modelPerfiles->load(Yii::$app->request->post())) {
            
            $model->password = password_hash($_POST['Usuario']['password'], PASSWORD_ARGON2I);
            $model->authKey = md5(random_bytes(5));
            $model->accessToken = password_hash(random_bytes(10), PASSWORD_DEFAULT);

            if ($model->save()) {
                /// PERFILES
                $perfiles = $modelPerfiles->id_perfil_usuario;
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
                //// PERFILES
                return $this->redirect(['view', 'id' => $model->p00]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'listaCargo' => $listaCargo,
            'listaDepartamento' => $listaDepartamento,
            'listaEstatusUsuario' => $listaEstatusUsuario,
            'modelPerfiles' => $modelPerfiles,
            'listaPerfiles' => $perfil,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $cargo = Cargo::find()->all();
        $departamento = Departamento::find()->all();
        $estatusUsuario = EstatusUsuario::find()->all();
        $listaCargo = ArrayHelper::map($cargo, 'id_cargo','descripcion');
        $listaDepartamento = ArrayHelper::map($departamento, 'id_departamento','descripcion');
        $listaEstatusUsuario = ArrayHelper::map($estatusUsuario, 'id_estatus_usuario','descripcion');
       
        // PERFILES
        $modelPerfiles = new PerfilUsuarioUsuario;
        $perfilActivo = $modelPerfiles->find()->where("p00 = :id",['id' => $id])->all();
        $perfil = PerfilUsuario::find()->all();
        $listaPerfiles = ArrayHelper::map($perfil, 'id_perfil_usuario','descripcion');
        
        // PERFILES

        if ($model->load(Yii::$app->request->post()) && $modelPerfiles->load(Yii::$app->request->post())) {
            if ($this->findModel($id)->password != $model->password){
                $model->password = password_hash($_POST['Usuario']['password'], PASSWORD_ARGON2I);
            }

            if ($model->save()){
                /// PERFILES
                    $perfiles = $modelPerfiles->id_perfil_usuario;
                   foreach ($perfilActivo as $e) {
                        $model2 = PerfilUsuarioUsuario::findOne($e->id_perfil_usuario__usuario);
                        $model2->estatus_perfil = false;
                        foreach ($perfiles as $perfil) {
                            if( $perfil == $e->id_perfil_usuario__usuario ){        
                                $model2->estatus_perfil = true; 
                            }
                        }
                        // echo $model2->id_perfil_usuario . " - " . $model2->estatus_perfil . "<br/>";
                       $model2->save();
                   }
                //// PERFILES
                return $this->redirect(['view', 'id' => $model->p00]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'listaCargo' => $listaCargo,
            'listaDepartamento' => $listaDepartamento,
            'listaEstatusUsuario' => $listaEstatusUsuario,
            'modelPerfiles' => $modelPerfiles,
            'listaPerfiles' => $perfil,
            'perfilActivo' => $perfilActivo,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
