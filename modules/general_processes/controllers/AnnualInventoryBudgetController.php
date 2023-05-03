<?php

namespace app\modules\general_processes\controllers;

use Yii;
use Exception;

use yii\base\Model;

use app\models\ProductBudgetDetail;
use app\models\AnnualInventoryBudget;
use app\modules\general_processes\models\AnnualInventoryBudgetSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use caiobrendo\dynamicgridform\Helper;

class AnnualInventoryBudgetController extends Controller
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
     * Lists all AnnualInventoryBudget models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AnnualInventoryBudgetSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AnnualInventoryBudget model.
     * @param int $id ID
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
     * Creates a new AnnualInventoryBudget model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $annualInventoryBudget = new AnnualInventoryBudget();
        $models = Helper::createMultiple(ProductBudgetDetail::class);

        $annualInventoryBudget->start_period = Yii::$app->formatter->asDate($annualInventoryBudget->start_period, 'yyyy-MM-dd');
        $annualInventoryBudget->end_period = Yii::$app->formatter->asDate($annualInventoryBudget->end_period, 'yyyy-MM-dd');
        $annualInventoryBudget->is_editable = true;

        $transaction = Yii::$app->db->beginTransaction();
        if ($annualInventoryBudget->load($this->request->post()) && Model::loadMultiple($models, $this->request->post()) && $annualInventoryBudget->save()) {
            try {
                foreach ($models as $model) {
                    $model->annual_inventory_budget = $annualInventoryBudget->id;
                    
                    if (!$model->save()) { throw new Exception(); }
                }
                $transaction->commit();

                $this->redirect(['index']);
            } catch (Exception $exception) {
                $transaction->rollBack();
                print_r($annualInventoryBudget->getErrors());
                print_r($model->getErrors());
            }
        }
        return $this->render('create', [
            'annualInventoryBudget' => $annualInventoryBudget,
            'models' => $models,
        ]);
    }

    /**
     * Updates an existing AnnualInventoryBudget model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
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
     * Deletes an existing AnnualInventoryBudget model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AnnualInventoryBudget model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AnnualInventoryBudget the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnnualInventoryBudget::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
