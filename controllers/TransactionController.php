<?php

namespace app\controllers;

use app\models\transaction;
use app\models\transactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactionController implements the CRUD actions for transaction model.
 */
class TransactionController extends Controller
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
     * Lists all transaction models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new transactionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single transaction model.
     * @param int $transaction_id Transaction ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($transaction_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($transaction_id),
        ]);
    }

    /**
     * Creates a new transaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new transaction();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'transaction_id' => $model->transaction_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing transaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $transaction_id Transaction ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($transaction_id)
    {
        $model = $this->findModel($transaction_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'transaction_id' => $model->transaction_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing transaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $transaction_id Transaction ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($transaction_id)
    {
        $this->findModel($transaction_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the transaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $transaction_id Transaction ID
     * @return transaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($transaction_id)
    {
        if (($model = transaction::findOne(['transaction_id' => $transaction_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
