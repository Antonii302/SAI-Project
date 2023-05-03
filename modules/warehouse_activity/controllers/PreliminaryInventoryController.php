<?php

namespace app\modules\warehouse_activity\controllers;

use Yii;
use Exception;

use yii\base\Model;

use app\models\PreliminaryInventory;
use app\modules\warehouse_activity\models\PreliminaryInventorySearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use caiobrendo\dynamicgridform\Helper;

class PreliminaryInventoryController extends Controller
{
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

    public function actionIndex()
    {
        $searchModel = new PreliminaryInventorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $dataProvider->pagination->pageSize = 5;
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $models = Helper::createMultiple(PreliminaryInventory::class);

        if (Model::loadMultiple($models, $this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($models as $model) {
                    $model->total_units = floatval($model->total_units);
                    $model->unit_price = floatval($model->unit_price);

                    $model->date_expiry = Yii::$app->formatter->asDate($model->date_expiry, 'yyyy-MM-dd');
                    
                    if (!$model->save()) { throw new Exception(); }
                }
                $transaction->commit();

                $this->redirect(['index']);
            } catch (Exception $exception) {
                $transaction->rollBack();
                print_r($model->getErrors());
            }
        }

        return $this->render('create', [
            'models' => $models,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->total_units = floatval($model->total_units);
            $model->unit_price = floatval($model->unit_price);

            $model->date_expiry = Yii::$app->formatter->asDate($model->date_expiry, 'yyyy-MM-dd');

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = PreliminaryInventory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
