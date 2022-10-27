<?php

namespace app\controllers;

use app\models\bill;
use app\models\billSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BillController implements the CRUD actions for bill model.
 */
class BillController extends Controller
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
     * Lists all bill models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new billSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single bill model.
     * @param int $bill_id Bill ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($bill_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($bill_id),
        ]);
    }

    /**
     * Creates a new bill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new bill();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'bill_id' => $model->bill_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing bill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $bill_id Bill ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($bill_id)
    {
        $model = $this->findModel($bill_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bill_id' => $model->bill_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing bill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $bill_id Bill ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($bill_id)
    {
        $this->findModel($bill_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the bill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $bill_id Bill ID
     * @return bill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bill_id)
    {
        if (($model = bill::findOne(['bill_id' => $bill_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
