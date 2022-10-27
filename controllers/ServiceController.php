<?php

namespace app\controllers;

use app\models\service;
use app\models\serviceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceController implements the CRUD actions for service model.
 */
class ServiceController extends Controller
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
     * Lists all service models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new serviceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single service model.
     * @param int $service_id Service ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($service_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($service_id),
        ]);
    }

    /**
     * Creates a new service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new service();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'service_id' => $model->service_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $service_id Service ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($service_id)
    {
        $model = $this->findModel($service_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'service_id' => $model->service_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $service_id Service ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($service_id)
    {
        $this->findModel($service_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $service_id Service ID
     * @return service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($service_id)
    {
        if (($model = service::findOne(['service_id' => $service_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
