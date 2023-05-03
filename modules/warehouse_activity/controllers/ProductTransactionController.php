<?php

namespace app\modules\warehouse_activity\controllers;

use app\models\PreliminaryInventory;
use app\models\ProductTransaction;
use app\models\InventoryDetail;

use app\modules\warehouse_activity\models\ProductoTransactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductTransactionController implements the CRUD actions for ProductTransaction model.
 */
class ProductTransactionController extends Controller
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
     * Lists all ProductTransaction models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductoTransactionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductTransaction model.
     * @param int $id Identificador
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductTransaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductTransaction();
        
        if ($model->load($this->request->post()) && $model->save()) {
            $results = PreliminaryInventory::find()->where(['product' => $model->product])->orderBy(['date_expiry' => SORT_DESC])->asArray()->all();

            if ($model->load($this->request->post())) {
            foreach($results as $result) {
                if ($result['total_units'] > $model->requested_units) {
                    if ($model->save()) {
                        return $this->redirect(['index']);

                    }
                }
            }
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTransaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Identificador
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTransaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Identificador
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTransaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Identificador
     * @return ProductTransaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductTransaction::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
