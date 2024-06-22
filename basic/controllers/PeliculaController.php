<?php

namespace app\controllers;

use app\models\Pelicula;
use app\models\PeliculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeliculaController implements the CRUD actions for Pelicula model.
 */
class PeliculaController extends Controller
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
     * Lists all Pelicula models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeliculaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pelicula model.
     * @param int $pelicula_id Pelicula ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pelicula_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pelicula_id),
        ]);
    }

    /**
     * Creates a new Pelicula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pelicula();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pelicula_id' => $model->pelicula_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pelicula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pelicula_id Pelicula ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pelicula_id)
    {
        $model = $this->findModel($pelicula_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pelicula_id' => $model->pelicula_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pelicula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pelicula_id Pelicula ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pelicula_id)
    {
        $this->findModel($pelicula_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pelicula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pelicula_id Pelicula ID
     * @return Pelicula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pelicula_id)
    {
        if (($model = Pelicula::findOne(['pelicula_id' => $pelicula_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
