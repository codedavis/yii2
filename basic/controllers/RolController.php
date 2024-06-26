<?php

namespace app\controllers;

use app\models\Rol;
use app\models\RolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RolController implements the CRUD actions for Rol model.
 */
class RolController extends Controller
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
     * Lists all Rol models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RolSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rol model.
     * @param int $rol_id Rol ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rol_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($rol_id),
        ]);
    }

    /**
     * Creates a new Rol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Rol();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rol_id' => $model->rol_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rol_id Rol ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rol_id)
    {
        $model = $this->findModel($rol_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rol_id' => $model->rol_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rol_id Rol ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rol_id)
    {
        $this->findModel($rol_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rol_id Rol ID
     * @return Rol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rol_id)
    {
        if (($model = Rol::findOne(['rol_id' => $rol_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
