<?php

namespace app\controllers;

use app\models\Tipoidentificacion;
use app\models\TipoidentificacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoidentificacionController implements the CRUD actions for Tipoidentificacion model.
 */
class TipoidentificacionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tipoidentificacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoidentificacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tipoidentificacion model.
     * @param int $tipo_identificacion_id Tipo Identificacion ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tipo_identificacion_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tipo_identificacion_id),
        ]);
    }

    /**
     * Creates a new Tipoidentificacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tipoidentificacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tipo_identificacion_id' => $model->tipo_identificacion_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tipoidentificacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tipo_identificacion_id Tipo Identificacion ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tipo_identificacion_id)
    {
        $model = $this->findModel($tipo_identificacion_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tipo_identificacion_id' => $model->tipo_identificacion_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tipoidentificacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tipo_identificacion_id Tipo Identificacion ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tipo_identificacion_id)
    {
        $this->findModel($tipo_identificacion_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tipoidentificacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tipo_identificacion_id Tipo Identificacion ID
     * @return Tipoidentificacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tipo_identificacion_id)
    {
        if (($model = Tipoidentificacion::findOne(['tipo_identificacion_id' => $tipo_identificacion_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
