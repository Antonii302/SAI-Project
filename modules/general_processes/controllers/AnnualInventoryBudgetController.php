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

use yii\helpers\ArrayHelper;

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
        $annual_inventory_budget = new AnnualInventoryBudget();
        $product_budget_detail = Helper::createMultiple(ProductBudgetDetail::class);
        
        $post_method = Yii::$app->request->post();

        if ($annual_inventory_budget->load($post_method) && Model::loadMultiple($product_budget_detail, $post_method)) {

            $annual_inventory_budget->start_period = Yii::$app->formatter->asDate($annual_inventory_budget->start_period, 'yyyy-MM-dd');
            $annual_inventory_budget->end_period = Yii::$app->formatter->asDate($annual_inventory_budget->end_period, 'yyyy-MM-dd');

            $transaction = Yii::$app->db->beginTransaction();

            try {
                if ($annual_inventory_budget->save()) {
                    foreach ($product_budget_detail as $product_detail) {
                        $product_detail->annual_inventory_budget = $annual_inventory_budget->id;
                        
                        if (!$product_detail->save()) { 
                             var_dump($product_detail->getErrors());
                            throw new Exception(); }
                    }
                    $transaction->commit();

                    $this->redirect(['index']);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('create', [
            'annual_inventory_budget' => $annual_inventory_budget,
            'product_budget_detail' => $product_budget_detail,
        ]);
    }

    public function actionUpdate($id) {
        $annual_inventory_budget = AnnualInventoryBudget::findOne(['id' => $id]);
        $product_budget_detail = $annual_inventory_budget->productBudgetDetails;

        $post_method = Yii::$app->request->post();
        
        if ($annual_inventory_budget->load($post_method)) {
            $annual_inventory_budget->start_period = Yii::$app->formatter->asDate($annual_inventory_budget->start_period, 'yyyy-MM-dd');
            $annual_inventory_budget->end_period = Yii::$app->formatter->asDate($annual_inventory_budget->end_period, 'yyyy-MM-dd');

            $transaction = Yii::$app->db->beginTransaction();
            
            try {
                if ($annual_inventory_budget->save()) {
                    $product_budget_detail = Helper::createMultiple(ProductBudgetDetail::class, $product_budget_detail);
                    Model::loadMultiple($product_budget_detail, $post_method);

                    $olds_records = ArrayHelper::map($annual_inventory_budget->productBudgetDetails, 'id', 'id');
                    $news_records = ArrayHelper::map($product_budget_detail, 'id', 'id');

                    $delete = array_diff($olds_records, $news_records);
                    ProductBudgetDetail::deleteAll(['id' => $delete]);

                    foreach ($product_budget_detail as $product_detail) {
                        $product_detail->annual_inventory_budget = $annual_inventory_budget->id;
                    }

                    if (!$product_detail->save()) { 
                        var_dump($product_detail->getErrors());
                       throw new Exception(); }

                    $transaction->commit();

                    $this->redirect(['index']);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
                        var_dump($annual_inventory_budget->getErrors());
            }
        }

        return $this->render('update', [
            'annual_inventory_budget' => $annual_inventory_budget,
            'product_budget_detail' => $product_budget_detail,
        ]);
    }

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
